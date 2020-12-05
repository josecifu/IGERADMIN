<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign_attendant_periods extends Model
{
    use HasFactory;
    public function Periods()
    {
        return $this->hasMany('App\Models\period')->where('State','Active')->get();
    }
}
