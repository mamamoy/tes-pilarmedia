<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPersons extends Model
{
    use HasFactory;
    protected $table = 'sales_persons';
    protected $guards = 'SalesPersonId';

    public function getKeyName()
    {
        return 'SalesPersonID';
    }
}
