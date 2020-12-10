<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    public function User()
    {
        return $this->hasOne(User::class,'Person_id','id')->first();
    }
    public function FullName()
    {
        return $this->Names." ".$this->LastNames;
    }
}
