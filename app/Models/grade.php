<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    use HasFactory;
    public function Level()
    {
        return $this->hasOne(level::class,'id','Level_id')->get();
    }
    public function GradeName()
    {
        return $this->Name." ".$this->Level()->first()->Name." ".$this->Section;
    }
    private function Courses()
    {
        return $this->hasMany(course::class)->get();
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
