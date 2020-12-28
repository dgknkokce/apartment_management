<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incometype extends Model
{
    use HasFactory;
    public function incomes()
    {
    	return $this->hasMany('App\Models\Income');
    }
}
