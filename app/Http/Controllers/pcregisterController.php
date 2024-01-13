<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pcregister;
use RealRashid\SweetAlert\Facades\Alert;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Uuid;
use BaconQrCode\Encoder\Encoder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use TCPDF;
use Illuminate\Http\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Assuming you have the $userid available from the 'users' table

use Illuminate\Support\Facades\File;


class PcregisterController extends Controller
{
    public function create()
    {
        return view('home.addpc');
    }

   

    public function store(Request $request)
    {
        // Get the all data  from the form
    $data = 'userId: ' . $request->user_id . ', ' .
        'username: ' . $request->username . ', ' .
        'description: ' . $request->description . ', ' .
        'pc_name: ' . $request->pc_name . ', ' .
        'serial_number: ' . $request->serial_number;
            // Generate QRcode
             // Generate QR code
            

   
   
        $request->validate([
            'user_id' => 'required|unique:pcregisters',
            'username' => 'required',
            'description' => 'required',
            'pc_name' => 'required',
            'serial_number' => 'required|unique:pcregisters',
             'photo' => 'required', 
        ]
        , [
            'user_id.required' => 'The User ID field is required.',
            'user_id.unique' => 'The User ID has already been taken.',
            'username.required' => 'The Username field is required.',
            'description.required' => 'The Description field is required.',
            'pc_name.required' => 'The PC Name field is required.',
            'serial_number.required' => 'The Serial Number field is required.',
            'serial_number.unique' => 'The Serial Number has already been taken.',
        ]);
        $user = Auth::user()->userid;
        if ($user) {
        $pcregister = new pcregister();
        $pcregister->userid=$user;
        $pcregister->user_id = $request->user_id;
        $pcregister->username = $request->username;
        $pcregister->description = $request->description;
        $pcregister->pc_name = $request->pc_name;
        $pcregister->serial_number = $request->serial_number;

        $img = $request->photo;
        $qrCodeData = QrCode::format('png')
        ->size(200)
        ->backgroundColor(255, 255, 255) // Set white background color (RGB: 255, 255, 255)
        ->color(10, 0, 10) // Set black foreground color (RGB: 0, 0, 0)
        ->generate($pcregister->user_id);

        

// Generate barcode
     // Replace with your barcode data
    $barcodeGenerator = new BarcodeGeneratorPNG();
    $barcodeImage = $barcodeGenerator->getBarcode($pcregister->user_id, $barcodeGenerator::TYPE_CODE_128);

    // Save barcode to a file
    $userId = $pcregister->username;
    $barcodeFilePath = storage_path('barcode/' . $userId . '.png');
        file_put_contents($barcodeFilePath, $barcodeImage);

    

// Save QR code to a file
        $qrCodeFilePath = storage_path('qrcode/'.$userId.'.png');
        file_put_contents($qrCodeFilePath, $qrCodeData);
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        $file = public_path('data/' . $fileName);
        file_put_contents($file, $image_base64);

        $pcregister->photo = 'data/' . $fileName;

        
        
        
        $pcregister->save();


                
        

        
    
          // Generate barcode PDF
       
       $pcregisters=pcregister::all();
      
        session()->flash('success', 'PC is registered successfully');
        return view('home.successpc', ['pcregisters' => $pcregisters, 'qrCodeData' => $qrCodeFilePath])->with('user', $user);
    } else {
        session()->flash('error', 'Failed to register PC');
        return redirect()->back()->with('message', 'QR code file not found.');
    }
        

    }
    public function downloadBothCode(Request $request)
    {
        $pcregisters=pcregister::all();
        return view('home.successpc', ['pcregisters' => $pcregisters,]);
    
    
    }

    public function downloadQRCode(Request $request)
    {
        $userId = $request->input('username');
        $filePath = storage_path('qrcode/' . $userId . '.png');
        
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            // Handle the scenario when the QR code file does not exist
            return redirect()->back()->with('message', 'QR code file not found.');
        }
    }
    

    public function downloadBarCode(Request $request)
    {
        $userId = $request->input('username');
        $filePath = storage_path('barcode/' . $userId . '.png');
        
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            // Handle the scenario when the QR code file does not exist
            return redirect()->back()->with('message', 'QR code file not found.');
        }
    }
    
  public function download (Request $request){
    $test = 'barcode.pdf';
    $file = Storage::download($test);

    return $file;
    
 }
    public function index()
    {
        $pcregisters = pcregister::all();
        return view('home.showpc', compact('pcregisters'));
    }


    public function searchbyqr(){
        return view('home.scanQrcode');
    }


    public function qr_result(Request $request)
{
    $data = $request->input('data');
    $user = pcregister::where('user_id', $data)->first();

    if ($user) {

        
        $userDetails = [
            'userid' => $user->user_id,
            'name' => $user->username,
            'serial' => $user->serial_number,
            'description'=>$user->description,
            'pc_name'=>$user->pc_name,
            'photo'=>$user->photo,
        ];

        return response()->json([
            'userExists' => true,
            'userDetails' => $userDetails
        ]);
    } else {
        return response()->json([
            'userExists' => false
        ]);
    }
}

    
    
 public function search()
 {
    return view('home.search');
    
 }

 

 public function searchUser(Request $request)
 {
    $userId = $request->input('user_id');
    // $user = pcregister::find($userId);
    $user = pcregister::where('user_id',$userId)->first();

    if ($user) {
        return view('home.search_result', ['user' => $user]);
    } else {
        
        return view('home.user_no_found', ['user' => $user]);
    }


 }


 public function searchBarcode(Request $request)
 {
    $userId = $request->input('user_id');
    // $user = pcregister::find($userId);
    $user = pcregister::where('user_id',$userId)->first();

    if ($user) {
        return view('home.generate', ['user' => $user]);
    } else {
        
        return view('home.user_no_found', ['user' => $user]);
    }


 }

 public function accessDenied(){
    return view('home.accessDenied');
 }

public function edit_pcregister($id){
    $pcregister = pcregister::find($id);
    return view('home.updatepc', ['user' => $pcregister]);
 }

 public function searchUpdate(Request $request)
 {
    $userId = $request->input('user_id');
    $user = pcregister::where('user_id', $userId)->first();

   
    if($user){
    return view('home.task',  ['user' => $user]);
    }
    else{
        return view('home.user_no_found', ['user' => $user]);
    }
 }


 public function delete_pcregister($id)
 {
    $pcregister = pcregister::find($id);
    
    if ($pcregister) {
        $pcregister->delete();
        return redirect()->back();
    } else {
        return back()->with('error', 'PC Register not found.');
    }
 }

 public function update(Request $request)
 {
    $request->validate([
        'user_id' => 'required',
        'username' => 'required',
        'description' => 'required',
        'pc_name' => 'required',
        'serial_number' => 'required|unique:pcregisters,serial_number,' . $request->id,
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
    ], [
        'user_id.required' => 'The User ID field is required.',
        'username.required' => 'The Username field is required.',
        'description.required' => 'The Description field is required.',
        'pc_name.required' => 'The PC Name field is required.',
        'serial_number.required' => 'The Serial Number field is required.',
        'serial_number.unique' => 'The Serial Number has already been taken.',
    ]);

    $pcregister = pcregister::find($request->id);

    if ($pcregister) {
        // Check if the updated serial number and user ID already exist in other records
        $existingRecord = pcregister::where('serial_number', $request->serial_number)
            ->where('user_id', $request->user_id)
            ->where('id', '!=', $request->id)
            ->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'Serial Number and User ID combination already exists.');
        }

        $pcregister->user_id = $request->user_id;
        $pcregister->username = $request->username;
        $pcregister->description = $request->description;
        $pcregister->pc_name = $request->pc_name;
        $pcregister->serial_number = $request->serial_number;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos');
        
            $pcregister->photo = $photoPath;
            
        }

        $pcregister->save();

        alert()->success('PC is successfully updated')->autoclose(5000);

        return redirect('/ud-operation');
    }

    return redirect()->back()->with('error', 'PC Register not found.');
 

 }

  
 }

