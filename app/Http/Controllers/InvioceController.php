<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvioceController extends Controller
{
    public function NewIvoice(){
    $company = Company::latest()->first();
        
        if(Auth::check()){
        return view('create_invioce', compact('company'));
        }
    }
}
