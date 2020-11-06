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
        return $this->Name." ".$this->Level()->first()->Name;
    }
}
