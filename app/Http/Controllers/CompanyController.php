<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function Edit(){
        $company= Company::latest()->get();
        return view('company.company_update', compact('company'));
    }

    public function Update(Request $request){
    $company_id =$request->company_id;
     $company = $request->validate([
        'name_english' => 'required',
        'name_other_language' => 'required',
        'vat' => 'required',
        'cr' => 'required',
        'phone' => 'required',
     ]); 

     $company_data = Company::find($company_id)->update($company);
     if($company_data) {
         return redirect()->route('new.invioce');
     }

        // return view('company.company_update');
    }
}
