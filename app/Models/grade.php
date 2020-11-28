<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    use HasFactory;
    public function Level()
    {
        return $this->hasOne(level::class,'id','Level_id')->first();
    }
    public function Period()
    {
        return $this->Level()->Period();
    }
    public function GradeNamePeriod()
    {
        return $this->GradeName()." / ".$this->Period()->Name;
    }
    public function GradeName()
    {
        return $this->Name." ".$this->Level()->first()->Name;
    }
    public function Courses()
    {
        return $this->hasMany(course::class)->get();
    }
    public function Students()
    {
        return $this->belongsToMany('App\Models\User', 'App\Models\Assign_student_grade')->where(['Year'=>'2021'])->wherePivot('State','Active')->get();
    }
    public function CoursesList()
    {
        $List="";
        foreach ($this->Courses() as $value) {
            if($List=="")
            {
                $List=$value->Name;
            }
            else
            {
                $List=$List.";".$value->Name;
            }
        }
        return $List;
    }
}
