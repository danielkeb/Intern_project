<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\pcregister;


class HomeController extends Controller
{
    public function index(){
        return view('home.userpage');
    }
    public function redirect()
    {
        $user = auth()->user();
    
        if ($user) {
            if ($user->usertype == 1) {

                $user=user::where('usertype','0')->count();
                $admin=user::where('usertype','1')->count();
                $un=User::where('usertype','2')->count();
                $studentpc=pcregister::where('description','Student')->count();
                $teacherpc=pcregister::where('description','Staff')->count();
                $otherpc=pcregister::where('description','Guest')->count();
                
                $pcregisters = pcregister::all();
        
               
            
                return view('admin.component',compact('user','un','admin','studentpc','teacherpc','otherpc','pcregisters'));
            
                
            } else if ($user->usertype == 0) {
                return view('home.scanQrcode');
            }
        }
    
        return view('auth.login');
    }
    

    
}
