<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['fullname', 'email', 'password', 'tel_no', 'flat_no', 'apartment_id', 'payment_type','role_id','is_deleted'];
    public function role()
    {
    	return $this->hasOne('App\Models\Role');
    }

    public function dues()
    {
        return $this->hasMany('App\Models\Due');
    }

    public function apartment()
    {
    	return $this->belongsTo('App\Models\Apartment');
    }
}
