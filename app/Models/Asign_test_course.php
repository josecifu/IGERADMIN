<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asign_test_course extends Model
{
    use HasFactory;
    public function Course(){
        return $this->hasOne('App\Models\course')->first();
    }
}
