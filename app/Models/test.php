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
    public function Activity(){
        return $this->hasOne('App\Models\Assign_activity','id','Activity_id')->first();
    }
    public function NoQuestions(){
        return count($this->Questions()) ?? 0;
    }
}
