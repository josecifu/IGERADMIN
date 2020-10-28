<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Assign_student_grade;
use App\Models\Asing_answer_test_student;
use App\Models\Asssign_schedule_course;
use App\Models\Person;
use App\Models\Schedule;
use App\Models\Note;
use App\Models\Test;

use App\Models\Information;
use App\Models\Assign_course_grade;
use App\Models\Asign_teacher_course;
use App\Models\course;
use App\Models\User;
use App\Models\grade;
use App\Models\level;

class Student extends Controller
{
    public function View_Profile()
    {
    }
    public function Edit_Profile()
    {
    }
    public function Update_Profile()
    {
    }
    public function View_Courses_Notes()
    {
    }
    public function View_Courses_Teachers()
    {
        //$titles = ['Id','Curso','Profesor','No. Telefono'];
        //$teacher = Person::all();
        //$models=[];
        //$id = $request->session()->get('User_id');
        //$studentgrade = Assign_student_grade::where('User_id',$id)->get('Grade_id');

        //return view('Student/Estudiante/Listado_Curso_Voluntario',compact('titles','models'));
    }
    public function View_Teacher_Informations(Request $request)
    {
    }
    public function View_Tests()
    {
    }
    public function Create_Answer_Tests()
    {
    }
    public function Store_Answer_Tests()
    {
    }
    public function View_Schedule()
    {
    }
    public function View_Forms()
    {
    }
    public function View_Calendar()
    {
    }
}
