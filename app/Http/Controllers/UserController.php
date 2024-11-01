<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Psy\CodeCleaner\FunctionContextPass;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use Illuminate\Support\Str;

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
            return redirect()->route('login')->with('success', 'User singup successfully.');
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
                return redirect()->route('new.invioce')->with('success','user login successfuly.'); // Redirect to user page
                }       
        }
        else{
            return back()->with('error', 'Credential not match');
        }
    }


    public function Logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'user logout successfully.');
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
        
        if($user){
        return redirect()->back()->with('success', 'User profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update user profile. Please try again.');
        }
       
    }

    public function ForgetPasswordForm(){
        return view('auth.forget_password');
    }

// send otp on the gmail 
    public function SendVerificationCode(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = rand(100000,999999);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
            'token' => $token,
            'created_at' => Carbon::now()
            ]  // Fields to update or insert
        );

        //send token by mail for reset password 
        Mail::send('email.forget_password_email', ['token' => $token], function($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        session(['email' => $request->email]);


        return redirect()->route('confirm.otp')->with('success', 'OTP send succesfully,');
    }

// otp form
    public function ConfirmOTPForm(){
        return view('auth.varify_token');
    }

//varify OTP 
    public function VarifyOTP(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|numeric|digits:6',
        ]);

        // Check if the code exists for the email
        $resetRecord = DB::table('password_reset_tokens')
                        ->where('email', $request->email)
                        ->where('token', $request->token)
                        ->first();

        // If the record exists, allow password reset
        if ($resetRecord) {
            return redirect()->route('reset.password')->with('email', $request->email)->with('success', 'OTP varified successfuly.');
        } else {
            return back()->withErrors(['code' => 'The code is invalid or expired.'])->with('error', 'OTP invalid');
        }
    }


    public function ResetPasswordForm(){
        return view('auth.reset_password');
    }
    
    public function ResetPassword( Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user){
            $user->update([
                'password' => $request->password
            ]);

// Send confirmation email after password reset
        Mail::send('email.password_reset_success', [], function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Your Password Has Been Reset');
        });

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();
// Clear the email from the session
        session()->forget('email');
            return redirect()->route('login')->with('success', 'Password reset successfully.');
        }

        return back()->withErrors(['email' => 'User not found.']);


    }
    
        
    
    
}
