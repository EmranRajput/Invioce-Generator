<?php

use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvioceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('create_invioce');
// });
// Route::get('/login', function () {
//     return view('auth.login');
// });
Route::get('/',[UserController::class, 'Login'])->name('login');
Route::post('/login',[UserController::class, 'UserLogin'])->name('user.login');
Route::get('/signup',[UserController::class, 'Singup'])->name('singup');
Route::post('/singup',[UserController::class, 'UserSignup'])->name('user.singup');
Route::get('/logout',[UserController::class, 'Logout'])->name('logout');


Route::controller(InvioceController::class)->group(function(){
    Route::get('/new-invoice', 'NewIvoice')->name('new.invioce');
 
    
});

