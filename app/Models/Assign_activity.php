<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign_activity extends Model
{
    use HasFactory;
    public function Tests(){
        return $this->hasMany('App\Models\test','Activity_id','id')->get();
    }
    public function Course(){
        return $this->hasOne(Course::class,'id','Course_id')->first();
    }
}
