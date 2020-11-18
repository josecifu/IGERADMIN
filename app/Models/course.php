<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    public function Tests(){
        return $this->hasMany(test::class)->get();
    }
    public function Activities(){
        return $this->hasMany(Assign_activity::class)->get();
    }
}
