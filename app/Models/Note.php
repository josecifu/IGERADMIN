<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    public function User()
    {
        return $this->hasOne(Assign_student_grade::class,'id','Student_id')->first();
    }
    public function Test()
    {
        return $this->hasOne('App\Models\test','id','Test_id')->first();
    }
}
