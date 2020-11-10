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
//tabla de Asignacion usuario rol
use App\Models\Assign_user_rol;
//tabla de Asignacion nivel grado
use App\Models\Assign_level_grade;
//tabla de Asignacion periodo nivel/grado
use App\Models\Assign_period_grade;
//tabla de cursos
use App\Models\course;
//tabla de usuarios
use App\Models\User;
//tabla de Personas
use App\Models\Person;
//tabla de grado
use App\Models\grade;
//tabla de Jornadas
use App\Models\period;
#Tabla nivel
use App\Models\level;
#Tabla logs
use App\Models\logs;
use Illuminate\Support\Facades\DB;

class Teacher extends Controller
{
    public function workspace()
    {
        $buttons =[];
        $button = [
            "Name" => 'Info',
            "Link" => '#',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        return view('Administration/Teachers/dashboard',compact('buttons'));
    }
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
        return view('Administration/Teachers/ListadoEstudiantes',compact('Titles','Models'));
    }
    public function View_Student_Scores()
    {
        $NIVELES = grade::find(5)->Level();
        $Titles = ['Id','Nombre del Estudiante','Curso','Grado','P1','P2','P3','P4','Final','Acciones'];
        return view('Administration/Teachers/NotasEstudiantes',compact('Titles'));
    }
    public function View_Student_Teacher_Score_Admin()
    {
        $NIVELES = grade::find(5)->Level();
        $Titles = ['Id','Nombre del Estudiante','Curso','Grado','P1','P2','P3','P4','Final','Acciones'];
        return view('Administration/Teachers/NotasEstudiantes',compact('Titles'));
    }
    public function list() //Visualizcion tabla Voluntarios con usuario
    {
        $buttons =[];
        $button = [
            "Name" => 'Añadir un voluntario',
            "Link" => 'administration/teacher/create',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver Voluntarios inactivos',
            "Link" => 'administration/teacher/desactive',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver Logs Voluntarios',
            "Link" => 'administration/teacher/logs',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $Titles =['Id','Nombres','Apellidos','Direccion','Telefono','Fecha Nacimiento','Usuario','Email', 'Acciones'];
        $usuario_rol = Assign_user_rol::where('Rol_id',3)->where('State','Active')->get('user_id');
        $Models = [];
        foreach ($usuario_rol as $v) {
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
        return view('Administration/Teachers/ListadoVoluntarios',compact('Models','Titles','buttons'));
    }
    public function create()
    {
        $buttons =[];
        $button = [
            "Name" => 'Listado Voluntarios',
            "Link" => 'administration/teacher/list',
            "Type" => "add"
        ];  
        $Cursos = course::all();
        $Grados = grade::all();
        $Niveles = level::all();
        $Jornadas = period::all();
        array_push($buttons,$button);
        return view('Administration/Teachers/formulario',compact('buttons','Cursos','Grados','Niveles','Jornadas'));
    }
    public function save(Request $request)
    {
        $id = $request->session()->get('User_id'); 
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        $Apellidos= $data['Apellido'];
        $Direccion= $data['Direccion'];
        $Telefono= $data['Telefono'];
        $FechaNacimiento= $data['FechaNacimiento'];
        $Usuario= $data['Usuario'];
        $Email= $data['Email'];
        $Contraseña = $data['Contraseña'];
        $Cursos = $data['Curso'];
        $grado = grade::find($data['Grado'])->GradeName();
        //LOGICA
        try {
              DB::beginTransaction();
                //Tabla peronas
                $person = new Person;
                $person->Names = $Nombres;
                $person->LastNames = $Apellidos;
                $person->Address = $Direccion;
                $person->Phone = $Telefono;
                $person->BirthDate = $FechaNacimiento;
                $person->save();
                //Tabla usuarios
                $user = new User;
                $user->name = $Usuario;
                $user->email = $Email;
                $user->password = bcrypt($Contraseña);
                $user->State = "Active";
                $user->Person_id =  $person->id;
                $user->save();
                //Tabla asignacion usuario a un rol
                $usuario_rol = new Assign_user_rol;
                $usuario_rol->rol_id = 3;
                $usuario_rol->user_id = $user->id;
                $usuario_rol->State = "Active";
                $usuario_rol->save();
                #Tabla logs
                $log = new logs;
                $log->Table = "Voluntario";
                $log->User_ID = $id;
                $log->Description = "Se creo nuevo voluntario con el id: ".$person->id;
                $log->Type = "Create";
                $log->save();
                $log = new logs;
                $log->Table = "Voluntario";
                $log->User_ID = $id;
                $log->Description = "Se creo nuevo usuario con nombre: ".$user->name." y correo: ".$user->email;
                $log->Type = "Create";
                $log->save();
                $log = new logs;
                $log->Table = "Voluntario";
                $log->User_ID = $id;
                $log->Description = "ID: ".$usuario_rol->id." de la Asignacion de rol voluntario al usuario: ".$user->id;
                $log->Type = "Assign";
                $log->save();
                for ($i=0; $i < count($Cursos) ; $i++) { 
                    $usuario_curso = new Asign_teacher_course;
                    $curso = course::find($Cursos[$i]);
                    $usuario_curso->user_id = $user->id;
                    $usuario_curso->Course_id = $Cursos[$i];
                    $usuario_curso->save();
                    #logs registro de asignación
                    $log = new logs;
                    $log->Table = "Voluntario";
                    $log->User_ID = $id;
                    $log->Description = "ID: ".$usuario_curso->id." de la Asignacion del usuario: ".$user->name. 
                    "al curso de ".$curso->Name." del grado de ".$grado;
                    $log->Type = "Assign";
                    $log->save();
                }
                DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(["Accion completada"]);
    }

    public function edit($id)
    {
        $buttons =[];
        $button = [
            "Name" => 'Listado Voluntarios',
            "Link" => 'administration/teacher/list',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $ModelsP = Person::find($id);
        $User = User::where('Person_id',$id)->first();
        $ModelsU = [
                'Usuario' => $User->name,
                'Email' => $User->email,
            ];
        return view('Administration/Teachers/updateForm',compact('ModelsP','ModelsU','buttons'));
    }

    public function update(Request $request)
    {
        $id = $request->session()->get('User_id');
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        $Apellidos= $data['Apellido'];
        $Direccion= $data['Direccion'];
        $Telefono= $data['Telefono'];
        $FechaNacimiento= $data['FechaNacimiento'];
        $Usuario = $data['Usuario'];
        $Email= $data['Email'];
        $PersonaID = $data['Persona'];
        //LOGICA Usuario
        $dataU=array(
            'name' => $Usuario,
            'email' => $Email,
        );
        User::where('Person_id', $PersonaID)->update($dataU);
        //LOGICA Persona
        $dataP=array(
            'Names' => $Nombres,
            'LastNames' => $Apellidos,
            'Address' => $Direccion,
            'Phone' => $Telefono,
            'BirthDate' =>$FechaNacimiento,
        );
        Person::where('id',$PersonaID)->update($dataP);
        $log = new logs;
        $log->Table = "people y users";
        $log->User_ID = $id;
        $log->Description = "Se actualizaron los datos de una persona con el id: ".$PersonaID." y correo ".$Email;
        $log->Type = "Update";
        $log->save();
        return response()->json(["Accion completada"]);
    }

    public function delete($id, Request $request)
    {
        $IID = $request->session()->get('User_id');
        $usuarioLogueado = User::find($IID);
        $r = User::find($id);
        $dataU=array(
            'State' => 'Desactivated',
        );
        $log = new logs;
        $log->Table = "Voluntario";
        $log->User_ID = $usuarioLogueado->name;
        $log->Description = "Se desactivo un usuario con el nombre: ".$r->name." y el correo: ".$r->email;
        $log->Type = "Delete";
        $log->save();
        User::where('Person_id', $id)->update($dataU);
        Assign_user_rol::where('user_id',$id)->update($dataU);
        return redirect()->route('ListTeacher');
    }
    public function score($id)
    {
        $Models = [];
        $course = course::find($id);
        $assignV = Asign_teacher_course::where('Course_id',$id)->get('user_id');
        $userV = user::find($assignV);
        $vol = Person::find($userV[0]->id);
        $p1 = $p2 = $p3 = $p4 = 0;
        $assignS = Assign_student_grade::where('Grade_id',$course->Grade_id)->get();
        foreach ($assignS as $value) {
            $notas = Note::where('Course_id',$id)->where('Studen_id',$value->id)->get();
            $user = user::find($value->user_id);
            $student = Person::find($user->Person_id);
            foreach ($notas as $valueN) {
                if($valueN->Unity == 1){
                    $p1 = $valueN->Score;
                }
                elseif ($valueN->Unity == 2) {
                    $p2 = $valueN->Score;
                }
                elseif ($valueN->Unity == 3) {
                    $p3 = $valueN->Score;
                }
                elseif ($valueN->Unity == 4) {
                    $p4 = $valueN->Score;
                }
            }
            $data = [
                "Nombre" => $student->Names,
                "Apellido" => $student->LastNames,
                "VN" => $vol->Names,
                "VA" => $vol->LastNames,
                'Curso' => $course->Name,
                'P1' => $p1,
                'P2' => $p2,
                'P3' => $p3,
                'P4' => $p4,
            ];
            array_push($Models,$data);
            $p1 = $p2 = $p3 = $p4 = 0;
        }
        $buttons =[];
        $button = [
            "Name" => 'Listado Voluntarios',
            "Link" => 'administration/teacher/list',
            "Type" => "btn1"
        ];
        $grado = grade::find($course->Grade_id)->GradeName();
        
        $Titles = ['Alumno','Voluntario','P1','P2','P3','P4','Acciones'];
        return view('Administration/Teachers/listadoNotas',compact('buttons','Titles','Models','course','grado'));
    }
    public function TestTeacher(Request $request,$id)
    {
        
    }
}