<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    // In Company.php
public function user()
{
    return $this->belongsTo(User::class);
}

    // In Company.php customer relationship with company hasMany
public function customers()
{
    return $this->hasMany(Customer::class,'company_id');
}




}
