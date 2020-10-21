<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Session;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public function person()
    {
        return $this->hasOne(Person::class,'id','Person_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rols(){
        return $this->belongsToMany(rol::class,'assign_user_rols');
    }
    public function setSession($rols,$name)
    {
        if(count($rols) == 1){
            Session::put([
                'rol_id' => $rols[0]['id'],
                'rol_Name' => $rols[0]['Name'],
                'User_id' => $this->id,
                'Username' =>$this->Username,
            ]);
        }
    }
}
