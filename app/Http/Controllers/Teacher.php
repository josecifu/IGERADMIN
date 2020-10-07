<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tabla de informacion
use App\Models\information;
//tabla de asignacion de informacion
use App\Models\Assign_files_information;
//tabla de notas
use App\Models\note;
//tabla de evaluaciones
use App\Models\Test;
//tabla de preguntas
use App\Models\Question;
//tabla de asignacion de preguntas a prueba
use App\Models\Asign_question_test;
//tabla de asignacion de prueba a curso
use App\Models\asign_test_course;

class Teacher extends Controller
{
	//publicacion de informacion
    public function Create_Information()
    {
    }

	public function Store_Information()
    {
    }

    public function Show_Information()
    {
    }

    public function Edit_Information()
    {
    }

    public function Update_Information()
    {
    }

    //Ingreso de notas
    public function Create_Note()
    {
    }

	public function Store_Note()
    {
    }

    public function Show_Note()
    {
    }

    //planificacion de evaluaciones
    public function Create_Test()
    {
    }

	public function Store_Test()
    {
    }

    public function Show_Test()
    {
    }

    public function Edit_Test()
    {
    }

    public function Update_Test()
    {
    }

    //preguntas de examen
    public function Create_Question()
    {
    }

	public function Store_Question()
    {
    }

    public function Show_Question()
    {
    }

    public function Edit_Question()
    {
    }

    public function Update_Question()
    {
    }

    //asignar de preguntas a examen
    public function Create_Assign_question_test()
    {
    }

	public function Store_Assign_question_test()
    {
    }

    public function Show_Assign_question_test()
    {
    }

    public function Edit_Assign_question_test()
    {
    }

    public function Update_Assign_question_test()
    {
    }

    //asignacion de examen a curso
    public function Create_Assign_test_course()
    {
    }

	public function Store_Assign_test_course()
    {
    }

    public function Show_Assign_test_course()
    {
    }

    public function Edit_Assign_test_course()
    {
    }

    public function Update_Assign_test_course()
    {
    }
}
