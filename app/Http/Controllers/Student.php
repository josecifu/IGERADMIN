<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Asignacion de estudiantes a grados
use App\Models\Assign_student_grade;
//Asignacion respuestas a examenes de un alumno
use App\Models\Asing_answer_test_student;
// Asignacion de horario a curso
use App\Models\Asssign_schedule_course;
//Modelo persona
use App\Models\person;
//modelo Horario
use App\Models\schedule;
//Modelo Nota
use App\Note;

class Student extends Controller
{
    public function ViewNotes()
    {
    }
    public function ViewTests()
    {
    }
    public function AnswerTests()
    {
    }
    public function ViewInformationCourses()
    {
    }
    public function ViewSchedule()
    {
    }
    public function ViewProfile()
    {
    }
}