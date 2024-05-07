<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesProducts extends Model
{
    use HasFactory;
    protected $table = 'sales_products';
    protected $guarded = ['id'];

    public function product(){
        return $this->belongsTo(Products::class, 'ProductID');
    }
}
