<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    public function apartment()
    {
    	return $this->belongsTo('App\Models\Apartment');
    }
}
