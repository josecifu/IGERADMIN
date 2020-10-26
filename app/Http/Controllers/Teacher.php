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
//tabla de asignacion de estudiante grado
use App\Models\Assign_student_grade;
//tabla de Asignacion cursos a grados
use App\Models\Assign_course_grade;
//tabla de Asignacion cursos a grados
use App\Models\Asign_teacher_course;
//tabla de cursos
use App\Models\course;
//tabla de cursos
use App\Models\User;
//tabla de Personas
use App\Models\Person;
//tabla de grado
use App\Models\grade;

class Teacher extends Controller
{
    public function View_Assigned_Student(Request $request)
    {
        $Titles = ['Id','Nombre','Apellido','Correo','Telefono','Grado'];
        $muestra = Person::all();
        $Models=[];        
        $id = $request->session()->get('User_id'); 
        $CursosVoluntario = Asign_teacher_course::where('user_id',$id)->get('Course_id');
        $gradoID = [];
        $asignacionStudentGradeID = [];
        $estudiantes = [];
        foreach ($CursosVoluntario as $value) {
            $cursoGrado = Assign_course_grade::where('Course_id',$value)->get('Grade_id');
        }
        $grado = grade::where('id',$cursoGrado);
        $asignacionStudentGrade = Assign_student_grade::where('Grade_id',$grado)->get('user_id');
        foreach ($asignacionStudentGrade as $value) {
            $datos = Person::all();
        }
        return view('Administration/voluntarios/ListadoEstudiantes',compact('Titles','Models'));
    }
    public function View_Student_Scores()
    {
        $NIVELES = grade::find(5)->Level();
        $Titles = ['Id','Nombre del Estudiante','Curso','Grado','P1','P2','P3','P4','Final','Acciones'];
        return view('Administration/Voluntarios/NotasEstudiantes',compact('Titles'));
    }
    //Ingreso de notas
    public function Edit_Note()
    {
        
    }
    public function Save_Note()
    {
        
    }
	//publicacion de informacion
    public function Create_Information()
    {
    }
    public function Create_Assistance()
    {
    }
    public function Create_Reports()
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
