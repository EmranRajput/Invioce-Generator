<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class InvioceController extends Controller
{
    public function NewIvoice(){
    $company = Company::latest()->first();
        
        if(Auth::check()){
        return view('create_invioce', compact('company'));
        }
    }

    public function StoreInvioce(Request $request){
        // return $request->all();
            // Validate customer details
            $customerValidate = $request->validate([
                'company_id' => 'required',
                'customer_name' => 'required',
                'customer_address' => 'required',
                'customer_vat' => 'required',
                'payment_type' => 'required',
                'date' => 'required',
            ]);

            // Create customer entry
            $customer = Customer::create($customerValidate);
            // .......................................................................
        // save product items 
            $product_details = $request->product_detail;
            $unite_prices = $request->unite_price;
            $quantities = $request->quantity;
            $amount = $request->amount;
            $discount = $request->discount;
            $discountAmount = $request->discount_amount ;
            $vatAmount = $request->vat_amount;
            $totalAmount = $request->total_amount;


        $productData = new Product();
        $productData->customer_id = $customer->id;
        $productData->product_detail = json_encode($product_details) ;
        $productData->unite_price = json_encode($unite_prices);
        $productData->quantity = json_encode($quantities);
        $productData->amount = json_encode($amount);
        $productData->discount = $discount;
        $productData->discount_amount = $discountAmount;
        $productData->vat_amount = $vatAmount;
        $productData->total_amount = $totalAmount;

        // Save the record to the database
        $productsave = $productData->save();

         if($productsave){
            // Generate PDF
            $pdf = PDF::loadView('pdf.product_invioce', ['productDetail' => $productData]);
             $pdf->download('product_detail.pdf');
            return back()->with('success', 'Product saved successfully and PDF generated.');
        } else {
            return back()->with('error', 'Product failed to save.');
        }

    }
    


}




