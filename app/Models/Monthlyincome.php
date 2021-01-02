<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthlyincome extends Model
{
    use HasFactory;
    public function dues()
    {
        return $this->hasMany('App\Models\Due');
    }
    public function apartment()
    {
        return $this->belongsTo('App\Models\Apartment');
    }
}
