<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    public function Tests(){
        return $this->hasManyThrough(test::class,Assign_activity::class,'Course_id','Activity_id')->get();
    }
    public function Activities(){
        return $this->hasMany(Assign_activity::class)->get();
    }
    public function Grade(){
        return $this->hasOne(grade::class,'id','Grade_id')->first();
    }
    public function Teacher(){
        return $this->belongsToMany('App\Models\User', 'asign_teacher_courses', 'Course_id', 'user_id')->first();
    }
}
