<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    use HasFactory;
    public function Level()
    {
        return $this->hasMany(level::class,'assign_level_grades');
    }
}
