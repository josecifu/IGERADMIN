<?php
//Modelo de usuarios
use App\User;
//Modelo de personas para usuarios
use App\Person;
//modelo de Menu
use App\menu;
// modelo de permisos para los menus
use App\permission;
//modelo de jornadas 
use App\period;
//modelo de niveles de grados
use App\level;
//modelo de grado
use App\grade;
//Modelo de aula
use App\classrom;
//modelo de materias
use App\course;
//modelo de periodos para los cursos
use App\schedule;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Administration extends Controller
{
    //Dashboard
    public function Dashboard()
    {
        return view('Administration.Dashboard.Vacio');
    }
	//Funciones de crear
    public function Create_User_Person()
    {

    }

    public function Create_menu()
    {
    	
    }
    public function Create_permission()
    {
    	
    }
    public function Create_grade()
    {
    	
    }
    public function Create_courses()
    {
    	
    }
    public function Create_schedule()
    {
    	
    }

    //Funciones para visualizacion de datos
    public function View_User_Person()
    {

    }
    public function View_menu()
    {
    	
    }
    public function View_permission()
    {
    	
    }
    public function View_grade()
    {
    	
    }
    public function View_courses()
    {
    	
    }
    public function View_schedule()
    {
    	
    }

    //Funciones de edicion
    public function Update_User_Person()
    {

    }
    public function Update_menu()
    {
    	
    }
    public function Update_permission()
    {
    	
    }
    public function Update_grade()
    {
    	
    }
    public function Update_courses()
    {
    	
    }
    public function Update_schedule()
    {
    	
    }
}
