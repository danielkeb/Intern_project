<?php


namespace App\Actions\Fortify;

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\pcregister;
use Illuminate\Http\Request;
use App\Actions\Fortify\PasswordValidationRules;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;

use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;

class adminController extends Controller
{
    
    
    
    use PasswordValidationRules;
    
        /**
         * Validate and create a newly registered user.
         *
         * @param  array<string, string>  $input
         */
        
         public function create(Request $request): View
         {
             $authenticatedUser = Auth::user();
         
             if ($authenticatedUser->usertype !== 1) {
                 // Throw an exception or handle the unauthorized registration attempt
             }
         
             $input = $request->validate([
                 'userid' => ['required', 'string', 'max:255', 'unique:users'],
                 'name' => ['required', 'string', 'max:255'],
                 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                 'password' => $this->passwordRules(),
                 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
             ]);
         
             $user = User::create([
                 'userid' => $input['userid'],
                 'name' => $input['name'],
                 'email' => $input['email'],
                 'phone' => $request->input('phone'),
                 'address' => $request->input('address'),
                 'password' => Hash::make($input['password']),
                 'registered_by' => $authenticatedUser->id, // Set the registered_by foreign key
             ]);
         
             // Redirect to the dashboard page with a success message
             $users = User::all();
             $userType = User::where('usertype', 2)->value('usertype'); // Default user type value
             return view('admin.permission', compact('users', 'userType'));
         }
        

            public function searchUser(Request $request)
            {
                $userId = $request->input('userid');
                // $user = pcregister::find($userId);
                $user = pcregister::where('userid',$userId)->first();
            
                if ($user) {
                    return view('admin.permission', ['user' => $user]);
                } else {
                    
                    return view('admin.permission', ['user' => $user])->with('error','user not found');
                }

            } 
                

        
        
    
    public function adminPage(){
        return view('admin.dashboard');
    }

    public function component(){
        $user=user::where('usertype','0')->count();
        $admin=user::where('usertype','1')->count();
        $un=User::where('usertype','2')->count();
        $studentpc=pcregister::where('description','Student')->count();
        $teacherpc=pcregister::where('description','Staff')->count();
        $otherpc=pcregister::where('description','Guest')->count();
        
        $pcregisters = pcregister::all();

       
    
        return view('admin.component',compact('user','un','admin','studentpc','teacherpc','otherpc','pcregisters'));
    }
    public function security(){
        $pcregisteredUsers = User::where('usertype', 0)->join('pcregisters', 'users.userid', '=', 'pcregisters.userid')
        ->select('pcregisters.username')
        ->get();

        $users = User::where('usertype', 0)
            ->select('name', 'email', 'phone')
            ->get();

        return view('admin.security', compact('pcregisteredUsers', 'users'));
 }

 public function task(){
    $users = User::all();
    $userType = User::where('usertype', 2)->value('usertype'); // Default user type value
    return view('admin.task', compact('users', 'userType'));
 }

    public function permission()
    {
        $users = User::all();
        $userType = User::where('usertype', 2)->value('usertype'); // Default user type value
        return view('admin.permission', compact('users', 'userType'));
    }

    public function register(){
        
        return view('auth.register');
    }
 
    public function update(Request $request)
    {
        $userId = $request->user_id; // Update parameter name to 'user_id'
        $userType = $request->usertype;
    
        $user = User::find($userId);
    
        if ($user) {
            $user->usertype = $userType;
            $user->save();
    
            return redirect()->back()->with('success', 'User Granted successfully.');
        }
    
        return redirect()->back()->with('error', 'User not Granted!!.');
    }
    
    public function details(){
        $user=User::where('usertype','1')->get();
        return view('admin.pcUser',compact('user'));
       
    
       
    }
    public function ungranted()
    {
        $user=User::where('usertype','2')->get();
        return view('admin.ungranted',compact('user'));
    }

    public function granted()
    {
        $user=User::where('usertype','0')->get();
        return view('admin.granted',compact('user'));
    }

    public function student()
    {
        $pcregisters=pcregister::where('description','student')->get();
        return view('admin.student',compact('pcregisters'));
    }
    public function staff()
    {
        $pcregisters=pcregister::where('description','staff')->get();
        return view('admin.staff',compact('pcregisters'));
    }

    public function guest()
    {
        $pcregisters=pcregister::where('description','other')->get();
        return view('admin.guest',compact('pcregisters'));
    }

    public function search(Request $request){
        $userId = $request->input('user_id');
    // $user = pcregister::find($userId);
    $user = pcregister::where('user_id',$userId)->first();

    if ($user) {
        return view('admin.view', ['user' => $user]);
    } else {
        return redirect()->back()->with('error', 'User not Granted!!.');
    }

    }

  
    
    
    


 }

