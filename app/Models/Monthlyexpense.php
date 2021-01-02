<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthlyexpense extends Model
{
    use HasFactory;
    public function expenses()
    {
        return $this->hasMany('App\Models\Expense');
    }
    public function apartment()
    {
        return $this->belongsTo('App\Models\Apartment');
    }
}
