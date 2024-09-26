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
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard'); // Redirect to admin page
             } else {
                return redirect()->route('new.invioce'); // Redirect to user page
                }       
        }
    }


    public function Logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile($id){
        if (Auth::check()) {
        $user = User::find($id);
        return view('auth.profile', compact('user'));
        }
    }

    public function UserUpdateProfile(Request $request){
        $userId = $request->userID;

     if ($request->file('photo')) {
           $file = $request->file('photo');
        // @unlink(public_path('upload/instructor_images/'.$data->photo));
           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('assets/images/user'),$filename);
           $data['photo'] = $filename; 
        }
        $user = User::find($userId)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'photo' => $filename,
        ]);
        return redirect()->back();
    }
    
        
    
    
}
