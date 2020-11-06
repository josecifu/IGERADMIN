<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class period extends Model
{
    use HasFactory;
    public function Grades()
    {
        return $this->hasManyThrough('App\Models\grade', 'App\Models\level');
    }
    public function Levels()
    {
        return $this->hasMany('App\Models\level');
    }
}
