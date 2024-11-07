<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

// public function setCatAttribute($value)

//     {

//         $this->attributes['product_detail'] = json_encode($value);
//         $this->attributes['unite_price'] = json_encode($value);
//         $this->attributes['quantity'] = json_encode($value);
//         $this->attributes['amount'] = json_encode($value);

//     }

    /**

     * Get the categories

     *

     */

    // public function getCatAttribute($value)

    // {

    //     return $this->attributes['product_detail'] = json_decode($value);
    //     return $this->attributes['unite_price'] = json_decode($value);
    //     return $this->attributes['quantity'] = json_decode($value);
    //     return $this->attributes['amount'] = json_decode($value);

    // }

public function customer()
{
    return $this->belongsTo(Customer::class);
}
}
