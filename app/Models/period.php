<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class period extends Model
{
    use HasFactory;
    public function Grades()
    {
        return $this->hasManyThrough('App\Models\grade', 'App\Models\level')->get();
    }
    public function NoGrades()
    {
         $count =0;
         foreach($this->Levels() as $level)
         {
             $count = $count+count($level->Grades());
         }
         return $count;
    }
    public function Levels()
    {
        return $this->hasMany('App\Models\level')->where('State','Active')->get();
    }
}
