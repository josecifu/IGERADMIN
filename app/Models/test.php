<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;
    public function Questions(){
        return $this->hasMany('App\Models\Question')->get();
    }
    public function NoQuestions(){
        return count($this->Questions()) ?? 0;
    }
}
