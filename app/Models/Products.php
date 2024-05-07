<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'ProductID';

    public function getKeyName()
    {
        return 'ProductID';
    }

    public function sales()
    {
        return $this->morphMany(Sales::class, 'salesable');
    }
    
}
