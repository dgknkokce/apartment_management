<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    public function expensetype()
    {
    	return $this->hasOne('App\Models\Expensetype');
    }

    public function apartment()
    {
    	return $this->hasOne('App\Models\Apartment');
    }
}
