<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    use HasFactory;
    public function permisos()
    {
    	return $this->belongsToMany(Perm::class, 'perm_rols');
    }
    public function Users()
    {
    	return $this->belongsToMany(user::class, 'assign_user_rols')->get();
    }
    public function validarpermiso($idPermiso)
    {
    	$active = PermRol::where(['Rol_id'=>$this->id,'perm_id'=>$idPermiso])->first();
    	if($active!=Null)
    		return true;
    	else
    		return false;
    }
}
