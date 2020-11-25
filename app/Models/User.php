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
        return $this->hasOne(Person::class,'id','Person_id')->first();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    public function Asssign_Grade()
    {
        return $this->hasOne('App\Models\Assign_student_grade','user_id','id')->first();
    }
    public function CoursesTeacher(){
        return $this->hasMany(Asign_teacher_course::class)->get();
    }
    public function CoursesTeacherData(){
        return $this->belongsToMany(course::class,'asign_teacher_courses','user_id','Course_id')->get();
    }
    public function CountTeacherPeriods()
    {
        $model=[];
        $Models=[];
        foreach($this->CoursesTeacherData() as $course)
        {
            if(!in_array($course->Grade()->Period()->Name,$model))
            {
                array_push($model,$course->Grade()->Period()->Name);
            }
            
        }
        return $model;
    }
    public function CountTeacherGrades()
    {
        $model=[];
        $Models=[];
        foreach($this->CoursesTeacherData() as $course)
        {
            if(!in_array($course->Grade()->Name,$model))
            {
                array_push($model,$course->Grade()->Name);
            }
            
        }
        return $model;
    }
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
    public function setSession($rols)
    {
        if(count($rols) == 1){
            Session::put([
                'rol_id' => $rols[0]['id'],
                'rol_Name' => $rols[0]['Name'],
                'User_id' => $this->id,
                'Username' =>$this->name,
                'Email' =>$this->email,
                'Name' =>$this->person()->Names." ".$this->person()->LastNames,
                'Avatar' =>$this->Avatar,
                'Gender' =>$this->person()->Gender,
            ]);
        }
    }
}
