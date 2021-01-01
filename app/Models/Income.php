<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    public function incometype()
    {
    	return $this->belongsTo('App\Models\Incometype');
    }

    public function apartment()
    {
    	return $this->hasOne('App\Models\Apartment');
    }
}
