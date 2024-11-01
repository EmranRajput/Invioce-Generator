<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvioceController;

// Route::get('/', function () {
//     return view('create_invioce');
// });
// Route::get('/login', function () {
//     return view('auth.login');
// });
Route::get('/email', function () {
    return view('email.forget_password_email');
});
Route::get('/',[UserController::class, 'Login'])->name('login');
Route::post('/login',[UserController::class, 'UserLogin'])->name('user.login');
Route::get('/signup',[UserController::class, 'Singup'])->name('singup');
Route::post('/singup',[UserController::class, 'UserSignup'])->name('user.singup');
Route::get('/logout',[UserController::class, 'Logout'])->name('logout');
//forget passoword
Route::get('/forget-password',[UserController::class, 'ForgetPasswordForm'])->name('forget.password');
Route::post('/forget-password',[UserController::class, 'SendVerificationCode'])->name('send.varification.code');
Route::get('/confirm-otp',[UserController::class, 'ConfirmOTPForm'])->name('confirm.otp');
Route::post('/confirm-otp',[UserController::class, 'VarifyOTP'])->name('varify.otp');
Route::get('/reset-password',[UserController::class, 'ResetPasswordForm'])->name('reset.password');
Route::post('/reset-password',[UserController::class, 'ResetPassword'])->name('reset.password.post');




Route::get('/profile/{id}',[UserController::class,'UserProfile'])->name('user.profile');
Route::post('profile',[UserController::class, 'UserUpdateProfile'])->name('user.update.profile');

        //User Routes
Route::middleware(['auth', 'user'])->group(function () {
    Route::controller(InvioceController::class)->group(function(){
        Route::get('/new-invoice', 'NewIvoice')->name('new.invioce');
    });


    Route::controller(CompanyController::class)->group(function(){
        Route::get('/company', 'Edit')->name('edit.company');   
        Route::post('/company', 'Update')->name('update.company');

    });

});

            //Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->name('user.list');
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
});

