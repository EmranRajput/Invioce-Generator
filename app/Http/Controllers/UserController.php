<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class UserController extends Controller
{
    public function Login(){
        return view('auth.login');
    }

    public function Singup(){
        return view('auth.sign_up');
    }

    public function UserSignup(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'country' => 'required',
        ]);

        $user = User::create($data);
        if($user){
            return redirect()->route('login');
        }
    }

    public function UserLogin(Request $request){
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password' =>'required',
        ]);
        
        if(Auth::attempt($credentials)){
            return redirect()->route('new.invioce');
        }
    }
    public function Logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    
        
    
    
}
