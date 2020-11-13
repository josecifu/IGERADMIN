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
use App\Models\test;
//tabla de preguntas
use App\Models\Question;
//tabla de asignacion de preguntas a prueba
use App\Models\Asign_question_test;
//tabla de asignacion de prueba a curso
use App\Models\Asign_test_course;
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
            "Name" => 'Ver Logs de Voluntarios',
            "Link" => 'administration/teacher/logs',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $Titles =['Id','Nombres','Apellidos','Telefono','Usuario','Email', 'Acciones'];
        $usuario_rol = Assign_user_rol::where('Rol_id',3)->where('State','Active')->get('user_id');
        $Models = [];
        foreach ($usuario_rol as $v) {
            $usuario = User::find($v->user_id);
            $persona = Person::find($usuario->Person_id);
                $data = [
                    'Id' => $persona->id,
                    'Name' => $persona->Names,
                    'Apellido' => $persona->LastNames,
                    'Telefono' => $persona->Phone,
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
        array_push($buttons,$button);
        return view('Administration/Teachers/formulario',compact('buttons'));
    }

    public function save(Request $request)  #REGISTRO Y ASIGNACIÓN DE VOLUNTARIOS
    {
        $id = user::find($request->session()->get('User_id')); 
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        $Apellidos= $data['Apellido'];
        $Telefono= $data['Telefono'];
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
                $person->Phone = $Telefono;
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
                $log->User_ID = $id->name;
                $log->Description = "Se registraron los nuevos datos del voluntario: ".$Nombres." ".$Apellidos;
                $log->Type = "Create";
                $log->save();
                $log = new logs;
                $log->Table = "Voluntario";
                $log->User_ID = $id->name;
                $log->Description = "Se creo un nuevo usuario con nombre: ".$user->name." y correo: ".$user->email." del voluntario: ".$Nombres;
                $log->Type = "Create";
                $log->save();
                $log = new logs;
                $log->Table = "Voluntario";
                $log->User_ID = $id->name;
                $log->Description = "Se asigno el rol voluntario al usuario: ".$user->name;
                $log->Type = "Assign";
                $log->save();
                for ($i=0; $i < count($Cursos) ; $i++) { 
                    $usuario_curso = new Asign_teacher_course;
                    $curso = course::find($Cursos[$i]);
                    $usuario_curso->user_id = $user->id;
                    $usuario_curso->Course_id = $Cursos[$i];
                    $usuario_curso->State = "Active";
                    $usuario_curso->save();
                    #logs registro de asignación
                    $log = new logs;
                    $log->Table = "Voluntario";
                    $log->User_ID = $id->name;
                    $log->Description = "Se asigno el usuario: ".$user->name.
                    " al curso de ".$curso->Name." del grado de ".$grado;
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

    public function update(Request $request)        #ACTUALIZAR VOLUNTARIO
    {
        $id = user::find($request->session()->get('User_id'));
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        $Apellidos= $data['Apellido'];
        $Telefono= $data['Telefono'];
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
            'Phone' => $Telefono,
        );
        Person::where('id',$PersonaID)->update($dataP);
        $log = new logs;
        $log->Table = "Voluntario";
        $log->User_ID = $id->name;
        $log->Description = "Se actualizaron los datos del voluntario: ".$Nombres." ".$Apellidos." y correo ".$Email;
        $log->Type = "Update";
        $log->save();
        return response()->json(["Accion completada"]);
    }

    public function delete($id, Request $request)   //ELIMINAR/DESACTIVAR VOLUNTARIO
    {
        $IID = user::find($request->session()->get('User_id'));
        $r = User::find($id);
        $dataU=array(
            'State' => 'Desactivated',
        );
        $log = new logs;
        $log->Table = "Voluntario";
        $log->User_ID = $IID->name;
        $log->Description = "El usuario: ".$r->name." con el correo: ".$r->email." fue desactivado";
        $log->Type = "Delete";
        $log->save();
        Asign_teacher_course::where('user_id',$r->id)->update($dataU);
        User::where('Person_id', $id)->update($dataU);
        Assign_user_rol::where('user_id',$id)->update($dataU);
        return redirect()->route('ListTeacher');
    }
    public function score($id)      //VISUALIZACIÓN DE NOTAS DE LAS UNIDADES
    {
        // if($assignV->isEmpty()){
        //     $vol = ["Names"=>"","LastNames"=>""];
        // }else{
        // }
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
                "Nombre" => $student->Names." ".$student->LastNames,
                "Vol" => $vol->Names.' '.$vol->LastNames,
                'P1' => $p1,
                'P2' => $p2,
                'P3' => $p3,
                'P4' => $p4,
                'Final' => 0,
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
        $Titles = ['Alumno','Voluntario','Unidad 1','Unidad 2','Unidad 3','Unidad 4','Nota Final','Acciones'];
        return view('Administration/Teachers/listadoNotas',compact('buttons','Titles','Models','course','grado'));
    }

            #===================    CRUD EXAMENES ================

    public function TestTeacher(Request $request,$id)   //VISTA DE EXAMENES DE UN CURSO
    {
        $Models = [];
        $assign = Asign_teacher_course::where('Course_id',$id)->first();
        $course = course::find($id);
        $userV = user::find($assign->user_id);
        $vol = Person::find($userV->Person_id);
        $p1 = $p2 = $p3 = $p4 = 0;
        $assignT = Asign_test_course::where('Teacher_id',$assign->id)->get();
        foreach ($assignT as $value) {
            $test = test::find($value->Test_id);
            if($test->Unity == 1){
                $p1 = $test->id;
            }
            elseif ($test->Unity == 2) {
                $p2 = $test->id;
            }
            elseif ($test->Unity == 3) {
                $p3 = $test->id;
            }
            elseif ($test->Unity == 4) {
                $p4 = $test->id;
            }
        }
        $data = [
            "VN" => $vol->Names,
            "VA" => $vol->LastNames,
            'P1' => $p1,
            'P2' => $p2,
            'P3' => $p3,
            'P4' => $p4,
        ];
        array_push($Models,$data);
        $buttons =[];
        $button = [
            "Name" => 'Listado Voluntarios',
            "Link" => 'administration/teacher/list',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Crear Examen',
            "Link" => 'administration/teacher/create/test',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $grado = grade::find($course->Grade_id)->GradeName();
        $Titles = ['Voluntario','Primer Examen','Segundo Examen','Tercer Examen','Cuarto Examen','Acciones'];
        return view('Administration/Teachers/ViewTests',compact('Titles','buttons','Models','course','grado'));
    }
    public function QuestionTest($id)   #VER PREGUNTAS DE UN EXAMEN
    {
        $test = test::find($id);
        $questions = Question::where('Test_id',$id)->get();
        
        return view('Administration/Teachers/QuestionTest',compact('test','questions'));
    }

    public function createExam()
    {
        $buttons =[];
        $button = [
            "Name" => 'Listado Voluntarios',
            "Link" => 'administration/teacher/list',
            "Type" => "add"
        ];  
        array_push($buttons,$button);
        return view('Administration/Teachers/CreateTest',compact('buttons'));
    }

    public function saveExam(Request $request)
    {
        $id = user::find($request->session()->get('User_id'));
        $persona = Person::find($id->Person_id);
        $data = $request->data[0];
        $Titulo = $data['Titulo'];
        $Punteo = $data['Punteo'];
        $Fechas = explode(' - ',$data['Fechas']);
        $HoraI = $data['HoraI'];
        $HoraF = $data['HoraF'];
        $Unidad = $data['Unidad'];
        $Preguntas = $data['Preguntas'];
        $examen = new test;
        $examen->Title = $Titulo;
        $examen->Score = $Punteo;
        $examen->StartDate = $Fecha[0].' '.$HoraI;
        $examen->EndDate = $Fecha[1].' '.$HoraF;
        $examen->Unity = $Unidad;
        $examen->save();
    }

    public function Desactive()         //vista usuarios desactivados
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
        $Titles =['Id','Nombres','Apellidos','Telefono','Usuario','Email', 'Acciones'];
        $usuario_rol = Assign_user_rol::where('Rol_id',3)->where('State','Desactivated')->get('user_id');
        $Models = [];
        foreach ($usuario_rol as $v) {
            $usuario = User::find($v->user_id);
            $persona = Person::find($usuario->Person_id);
                $data = [
                    'Id' => $persona->id,
                    'Name' => $persona->Names,
                    'Apellido' => $persona->LastNames,
                    'Telefono' => $persona->Phone,
                    'Usuario' => $usuario->name,
                    'Correo' => $usuario->email,
                ];
            array_push($Models,$data);
        }
        return view('Administration/Teachers/TeacherInactive',compact('Models','Titles','buttons'));
    }
    public function Activate($id, Request $request)
    {
        $IID = user::find($request->session()->get('User_id'));
        $r = User::find($id);
        $dataU=array(
            'State' => 'Active',
        );
        $log = new logs;
        $log->Table = "Voluntario";
        $log->User_ID = $IID->name;
        $log->Description = "El usuario: ".$r->name." con el correo: ".$r->email." fue Activado";
        $log->Type = "Active";
        $log->save();
        // Asign_teacher_course::where('user_id',$r->id)->update($dataU);
        User::where('Person_id', $id)->update($dataU);
        Assign_user_rol::where('user_id',$id)->update($dataU);
        return redirect()->route('ListTeacher');
    }
    public function logs()      //Visualizcion tabla logs voluntarios
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
            "Name" => 'Ver Logs de Voluntarios',
            "Link" => 'administration/teacher/logs',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $Titles =['Id','Usuario Responsable','Descripcion','Tipo','Hora y fecha de creacion', 'Acciones'];
        $logs = logs::where('Table','Voluntario')->get();
        $Models = [];
        foreach ($logs as $l) {
                $data = [
                    'Id' => $l->id,
                    'Usuario' => $l->User_Id,
                    'Descripcion' => $l->Description,
                    'Tipo' => $l->Type,
                    'HF' => $l->created_at,
                ];
                array_push($Models,$data);
        }
        return view('Administration/Teachers/logs',compact('Models','Titles','buttons'));
    }
    public function statistics()        #VISTA DE ESTADISTICAS
    {
        return view('Administration/Teachers/statistics');
    }

    public function LoadCourses(Request $request)       // CARGAR CURSOS FORMULARIO DE ASIGNACIÓN
    {
        $assignT = Asign_teacher_course::where('State','Active')->get();
        if($assignT->isEmpty()){
            $CoursesData = course::where('Grade_id',$request['GradeId'])->get();
        }else{
            $ids = [];
            foreach ($assignT as $value) {
                array_push($ids,$value->Course_id);
            }
            $CoursesData = course::where('Grade_id',$request['GradeId'])->get()->except($ids);
        }
        $courses =[];
        foreach ($CoursesData as $value) {
            $course = [
                "Id" =>$value->id,
                "Name" =>$value->Name,
            ];
            array_push($courses,$course);
         } 
        return response()->json([
            "Courses" => $courses,
            ]);
    }
}