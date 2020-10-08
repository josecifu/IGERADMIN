<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Modelo de usuarios
use App\Models\User;
//Modelo de personas para usuarios
use App\Models\Person;
//modelo de Menu
use App\Models\menu;
//modelo de Rol
use App\Models\rol;
// modelo de permisos para los menus
use App\Models\permission;
//modelo de jornadas 
use App\Models\period;
//modelo de niveles de grados
use App\Models\level;
//modelo de grado
use App\Models\grade;
//Modelo de aula
use App\Models\classrom;
//modelo de materias
use App\Models\course;
//modelo de periodos para los cursos
use App\Models\schedule;
//Modelo Asignacion roles a usuario
use App\Models\Assign_user_rol;
//Modelo Asignacion roles a usuario
use App\Models\Assign_student_grade;
//Modelo Asignacion Jornada grado
use App\Models\Assign_period_grade;
//Modelo Asignacion nivel grado
use App\Models\Assign_level_grade;

class Administration extends Controller
{
    //Dashboard
    public function Dashboard()
    {
        return view('Administration.Dashboard.Vacio');
    }
    public function View_Clients()
    {
        $Titles =['Id','Nombre','Apellido','Pais','Pais','Pais','Pais','Pais','Pais','Pais','Acciones'];
        $Models = [];
        $model = user::all();
        dd($model->person->Name);
        
        foreach ($model as $value) {
            $person = Person::where('id',$value->Person_id)->first();
            $data = [
                'Id' => $value->id,
                'Name' => $person->Names,
                'Apellido' => $person->LastNames,
                'Grado' => '4to Primaria',
            ];
            array_push($Models,$data);
        }

        return view('Administration.Clientes.ListadoClientes',compact('Titles','Models'));
    }
    
	//Funciones de crear
    public function Create_User_Person(Request $request)
    {
        $usuario = new User;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->contraseña);
        $usuario->Person_id = $request->persona;
        $usuario->save();
        return redirect()->action([Administration::class,'View_User_Person']);
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
    //Visualizcion tabla personas con usuario
    public function View_User_Person()
    {
        $Titles = ['Id','Nombres','Apellidos','Direccion','Telefono','Fecha Nacimiento','Usuario','Email'];
        $usuarios = User::all();
        $Models = [];
        foreach ($usuarios as $value) {
            $persona = Person::where('id',$value->Person_id)->firstorfail();
            $data = [
                'Id' => $persona->id,
                'Name' => $persona->Names,
                'Apellido' => $persona->LastNames,
                'Direccion' => $persona->Address,
                'Telefono' => $persona->Phone,
                'Fecha_Nacimiento' => $persona->BirthDate,
                'Usuario' => $value->name,
                'Correo' => $value->email,
            ];
            array_push($Models,$data);
        }
        return view('Administration/Personas/ListadoPersonas',compact('Models','Titles'));
    }

    public function View_Menu()
    {
    	$menus = menu::all();
        return view('Administration.Menu.ListadoMenus',compact('menus'));
    }
    //Visualizcion tabla Estudiantes con usuario
    public function View_User_Student()
    {
        $Titles =['Id','Nombres','Apellidos','Direccion','Telefono','Fecha Nacimiento','Usuario','Email'];
        $usuario_rolEstudiante = Assign_user_rol::where('Rol_id',1)->get('user_id');
        $Models = [];
        foreach ($usuario_rolEstudiante as $v) {
            $usuario = User::find($v->user_id);
            $persona = Person::find($usuario->Person_id);
                $data = [
                    'Id' => $persona->id,
                    'Name' => $persona->Names,
                    'Apellido' => $persona->LastNames,
                    'Direccion' => $persona->Address,
                    'Telefono' => $persona->Phone,
                    'Fecha_Nacimiento' => $persona->BirthDate,
                    'Usuario' => $usuario->name,
                    'Correo' => $usuario->email,
    
                ];
                array_push($Models,$data);
        }
        return view('Administration/Estudiantes/ListadoEstudiantes',compact('Models','Titles'));
    }
    //Visualizcion tabla personas con usuario
    public function View_Student_Assignment()
    {
        $Titles = ['ID Asignacion','Nombres','Apellido','Direccion','Telefono','Fecha Nacimiento','Grado'];
        $asignaciones = Assign_student_grade::all();
        $Models = [];
        foreach ($asignaciones as $value) {
            $usuario = User::where('id',$value->user_id)->first(); //Obtencion usuario de aignacion estudiante/grado
            $estudiante = Person::where('Person_id',$usuario->Person_id)->first(); //obtencion del estudiante de usuario
            $jornadaGrado = Assign_period_grade::where('id',$value->Grade_id)->first(); //obtencion jornada/grado de asignacion estudiante/grado
            $nivelGrado = Assign_level_grade::where('id',$jornadaGrado->grade_level_id)->first();
            $grado = grade::where('id',$nivelGrado->Grade_id)->first();
            $data = [
                'Id' => $value->id,
                'Name' => $estudiante->Names,
                'Apellido' => $estudiante->LastNames,
                'Direccion' => $estudiante->Address,
                'Telefono' => $estudiante->Phone,
                'Fecha_Nacimiento' => $estudiante->BirthDate,
                'Grado' => $grado->Name,
            ];
            array_push($Models,$data);
        }
        return view('Administration/Estudiantes/ListadoAsignacionEstudiante',compact('Models','Titles'));
    }
    public function View_Rol()
    {
        $rols = rol::all();
        return view('Administration.Rol.ListadoRoles',compact('rols'));       
    }
    public function View_Permission()
    {
        $Titles = ['ID','Nombre Permiso', 'Slug'];
        $permisos = permission::all();
        return view('Administration/Permisos/ListadoPermisos',compact('permisos','Titles'));
    }
    public function View_Course()
    {
        $courses = course::all();
        return view('Administration.Curso.ListadoCursos',compact('courses'));
    }
    public function View_Grade()
    {
        $grades = grade::all();
        return view('Administration.Grado.ListadoGrados',compact('grades'));
    }
    public function View_Level()
    {
        $levels = level::all();
        return view('Administration.Nivel.ListadoNiveles',compact('levels'));
    }
    public function View_Classroom()
    {
        $classrooms = classroom::all();
        return view('Administration.Clase.ListadoClases',compact('classrooms'));
    }
    public function View_Schedule()
    {
        
    }

    //Funcion edicion
    public function Edit_User_Person(User $usuario)
    {
        return view('Pruebas/editarU',compact('usuario'));
    }
    //Funciones de Actualizar
    public function Update_User_Person($id, Request $request)
    {
        $data=array(
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->contraseña),
            'Person_id' => $request->persona,
        );
        User::where('id', $id)->update($data);
        return redirect()->action([Administration::class,'View_User_Person']);
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
