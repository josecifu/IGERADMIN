<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    use HasFactory;
    public function Grades()
    {
        return $this->hasMany('App\Models\grade')->get();
    }
    public function Period()
    {
        return $this->hasOne('App\Models\period','id','Period_id')->first();
    }
}
