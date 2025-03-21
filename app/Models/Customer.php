<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

public function company()
{
    return $this->belongsTo(company::class);
}

public function products()
{
    return $this->hasMany(Product::class,'customer_id');
}
}
