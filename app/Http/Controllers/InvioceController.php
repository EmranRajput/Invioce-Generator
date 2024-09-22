<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvioceController extends Controller
{
    public function NewIvoice(){
        if(Auth::check()){
        return view('create_invioce');
        }
    }
}
