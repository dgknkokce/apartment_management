<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    public function users()
    {
    	return $this->hasMany('App\Models\User');
    }

    public function monthlyincomes()
    {
    	return $this->hasMany('App\Models\Monthlyincome');
    }

    public function monthlyexpenses()
    {
    	return $this->hasMany('App\Models\Monthlyexpense');
    }

    public function announcements()
    {
    	return $this->hasMany('App\Models\Announcement');
    }
}
