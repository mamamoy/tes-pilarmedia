<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $primaryKey = 'SalesID';
    protected $guarded = ['SalesID'];

    public function salesProduct(){
        return $this->hasMany(SalesProducts::class, 'id');
    }

    public function salesPerson(){
        return $this->belongsTo(SalesPersons::class, 'SalesPersonID');
    }

    public function salesable()
    {
        return $this->morphTo();
    }
}
