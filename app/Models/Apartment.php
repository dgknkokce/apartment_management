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

    public function incomes()
    {
    	return $this->hasMany('App\Models\Income');
    }

    public function expenses()
    {
    	return $this->hasMany('App\Models\Expense');
    }

    public function announcements()
    {
    	return $this->hasMany('App\Models\Announcement');
    }
}
