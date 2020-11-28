<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function Test(){
        return $this->hasOne('App\Models\test','id','Test_id')->first();
    }
}
