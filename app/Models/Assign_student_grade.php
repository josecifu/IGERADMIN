<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign_student_grade extends Model
{
    use HasFactory;
    public function Grade()
    {
        return $this->hasOne('App\Models\grade','id','Grade_id')->first();
    }
    public function User()
    {
        return $this->hasOne('App\Models\user','id','user_id')->first();
    }
}
