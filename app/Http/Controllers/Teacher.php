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
//tabla asignacion actividad
use App\Models\Assign_activity;
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
        return view('Administration/Teachers/spaceWork',compact('buttons'));
    }
    public function dashboard()
    {
     
        return view('Teacher/Home');
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
        $Titles =['Id','Nombres','Apellidos','Telefono','Usuario','Email','Cursos Asignados','Acciones'];
        $usuario_rol = Assign_user_rol::where('Rol_id',3)->where('State','Active')->get('user_id');
        $Models = [];
        foreach ($usuario_rol as $v) {
            $usuario = User::find($v->user_id);
            $persona = Person::find($usuario->Person_id);
            $curses = User::find($v->user_id)->CoursesTeacher();
            $dataT = [];
            foreach ($curses as $value) {
                $curso = course::find($value->Course_id);
                $dataC = [
                    'Curso' => $curso->Name,
                ];
                array_push($dataT,$dataC);
            }
            $data = [
                'Id' => $persona->id,
                'Name' => $persona->Names,
                'Apellido' => $persona->LastNames,
                'Telefono' => $persona->Phone,
                'Usuario' => $usuario->name,
                'Correo' => $usuario->email,
                'Curses' => $dataT,
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
        $masculino = $data['masculino'];
        $grado = grade::find($data['Grado'])->GradeName();
        //LOGICA
        try {
              DB::beginTransaction();
                //Tabla peronas
                $person = new Person;
                $person->Names = $Nombres;
                $person->LastNames = $Apellidos;
                $person->Phone = $Telefono;
                if ($masculino == "true") {
                    $person->Gender = 'Masculino';
                } else {
                    $person->Gender = 'Femenino';
                }
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
        $Models = [];
        $course = course::find($id);
        $assignV = Asign_teacher_course::where('Course_id',$id)->first();
        if(isset($assignV)){
            $userV = user::find($assignV->user_id);
            $vol = Person::find($userV->id);
        }else{
            return redirect('/administration/teacher/list')->withErrors(['msg', 'No se ha asignado un voluntario al curso']);
        }
        $Titles = [];
        $Models = [];
        $Modal = [];
        $Activities = Assign_activity::where([['Course_id',$id],['State','Active']])->get();
        $gradeStudents = grade::find($course->Grade_id)->Students();
        foreach($Activities as $Activity)
        {
            $moda = [
                'id' => $Activity->id,
                "Name" => $Activity->Name,
            ];
            array_push($Modal,$moda);
            $act = [
                "Name" =>$Activity->Name,
                "No" =>count($Activity->Tests()),
                "Test" => $Activity->Tests(),
            ];
            array_push($Titles,$act);
            // dd($Titles);
        }
        
        foreach($gradeStudents as $student)
        {
            $notas=[];
            foreach($Activities as $Activity)
            {
                if(count($Activity->Tests())==0)
                {
                    array_push($notas," ");
                }
                else
                {
                    foreach($Activity->Tests() as $test)
                    {
                        array_push($notas,"0");
                    }
                }
            }
            $model =[
                'Alumno' => $student->person()->Names." ".$student->person()->LastNames,
                'Notas' =>$notas,
            ];
            array_push($Models,$model);
        }
        $buttons =[];
        $button = [
            "Name" => 'Crear Actividad',
            "Link" => "create()",
            "Type" => "addFunction"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver detalles de actividad',
            "Link" => 'modal()',
            "Type" => "addFunction1"
        ];
        array_push($buttons,$button);
        $Nombre = $vol->Names.' '.$vol->LastNames;
        $grado = grade::find($course->Grade_id)->GradeName();
        // $activity = Assign_activity::where('Course_id',$id)->get();
        // $actividades = [];
        // foreach ($activity as $value) {
        //     $data=[
        //         "Nombre" => $value->Name
        //     ];
        //     array_push($actividades,$data);
        // }
        return view('Administration/Teachers/listadoNotas',compact('buttons','Modal','Titles','Models','Nombre','course','grado'));
    }

            #===================    CRUD EXAMENES ================

    public function TestTeacher(Request $request,$id)   //VISTA DE EXAMENES DE UN CURSO
    {
        $assign = Asign_teacher_course::where('Course_id',$id)->first();
        if(isset($assign->user_id)){
            $userV = user::find($assign->user_id);
            $vol = Person::find($userV->Person_id);
            $Nombre = $vol->Names .' '.$vol->LastNames;
        }else{
            return redirect('/administration/teacher/list')->withErrors(['msg', 'The Message']);
        }
        $course = course::find($id);
        $Titles = [];
        $Models = [];
        $Activities = Assign_activity::where('Course_id',$id)->get();
        foreach($Activities as $Activity)
        {
            $act = [
                "Name" =>$Activity->Name,
                "No" =>count($Activity->Tests()),
                "Test" => $Activity->Tests(),
            ];
            foreach($Activity->Tests() as $Test)
            {
                $model =[
                    "Id" => $Test->id,
                    "NoQuestions" => $Test->NoQuestions(),
                ];
                array_push($Models,$model);
            }
            array_push($Titles,$act);
        }
        $buttons =[];
        $button = [
            "Name" => 'Listado Voluntarios',
            "Link" => 'administration/teacher/list',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Crear Examen',
            "Link" => 'administration/teacher/create/test/'."$id",
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $grado = grade::find($course->Grade_id)->GradeName();
        
        return view('Administration/Teachers/ViewTests',compact('Titles','buttons','Nombre','course','grado','Models','id'));
    }
    public function QuestionTest($id,$curso)   #VER PREGUNTAS DE UN EXAMEN
    {
        $test = test::find($id);
        $questions = Question::where('Test_id',$id)->get();
        return view('Administration/Teachers/QuestionTest',compact('test','questions','curso'));
    }

    public function createExam($id)
    {
        $buttons =[];
        $button = [
            "Name" => 'Listado Voluntarios',
            "Link" => 'administration/teacher/list',
            "Type" => "add"
        ];  
        array_push($buttons,$button);
        $actividad = Assign_activity::where('Course_id',$id)->where('State','Active')->get();
        $actividades=[];
        foreach ($actividad as $value) {
            $data = [
                'id' => $value->id,
                "Nombre" => $value->Name,
            ];
            array_push($actividades,$data);
        }
        return view('Administration/Teachers/CreateTest',compact('buttons','id','actividades'));
    }
    public function saveExam(Request $request)
    {
        $id = user::find($request->session()->get('User_id'));
        $persona = Person::find($id->Person_id);
        $data = $request->data[0];
        $Titulo = $data['Titulo'];
        $Punteo = $data['Punteo'];
        $actividad = $data['actividad'];
        $curso = $data['curso'];
        $c = course::find($curso);
        $grado = grade::find($c->Grade_id)->GradeName();
        if ($data['tipoexamen'] == 'true') {
            $Fechas = explode(' - ',$data['Fechas']);
            $HoraI = $data['HoraI'];
            $HoraF = $data['HoraF'];
            $Preguntas = $data['Preguntas'];
            try {
                DB::beginTransaction();
                $examen = new test;
                $examen->Title = $Titulo;
                $examen->Score = $Punteo;
                $examen->StartDate = $Fechas[0].' '.$HoraI;
                $examen->EndDate = $Fechas[1].' '.$HoraF;
                $examen->Activity_id = $actividad;
                $examen->State = 'Active';
                $examen->save();
                $assignVol = Asign_teacher_course::where('Course_id',$curso)->first();
                $assignTest = new Asign_test_course;
                $assignTest->Teacher_id = $assignVol->id;
                $assignTest->Test_id = $examen->id;
                $assignTest->save();
                $log = new logs;
                $log->Table = "Voluntario";
                $log->User_ID = $id->name;
                $log->Description = "El usuario ".$id->name." creo un nuevo examen virtual para el curso de ".$c->Name." de ".$grado;
                $log->Type = "Create";
                $log->save();
                DB::commit();
            }catch (Exception $e) {
                DB::rollBack();
            }
            return response()->json(["id"=>$examen->id]);
        } else {
            try {
                DB::beginTransaction();
                $examen = new test;
                $examen->Title = $Titulo;
                $examen->Score = $Punteo;
                $examen->Activity_id = $actividad;
                $examen->State = 'Fisico';
                $examen->save();
                $assignVol = Asign_teacher_course::where('Course_id',$curso)->first();
                $assignTest = new Asign_test_course;
                $assignTest->Teacher_id = $assignVol->id;
                $assignTest->Test_id = $examen->id;
                $assignTest->save();
                $log = new logs;
                $log->Table = "Voluntario";
                $log->User_ID = $id->name;
                $log->Description = "El usuario ".$id->name." creo un nuevo examen fisico para el curso de ".$c->Name." de ".$grado;
                $log->Type = "Create";
                $log->save();
                DB::commit();
            }catch (Exception $e) {
                DB::rollBack();
            }
            return response()->json(["Accion Completada"]);
        }
        
    }
    public function AssignQuestion($id,$preguntas)
    {
        return view('Administration/Tests/1',compact('id','preguntas'));
    }
    public function SaveAssignQuestion(Request $request)
    {
        
        $data = $request->data;
        $test = $request->ID;
        $assignTest = Asign_test_course::where('Test_id',$test)->first();
        $assign = Asign_teacher_course::find($assignTest->Teacher_id);
        foreach ($data as $value) {
            $value = $value[0];
            $preguntas = new Question;
            $preguntas->Title = $value['Titulo'];
            $preguntas->Content = $value['Contenido'];
            $preguntas->Score = $value['Punteo'];
            $preguntas->Type = $value['TipoPregunta'];
            $preguntas->Answers = $value['Respuesta'];
            if ($value['TipoPregunta'] == 'Multiple') {
                $temp = "";
                for ($i=0; $i < count($value['PosibleR']) ; $i++) { 
                    $temp = $temp . $value['PosibleR'][$i] . ',';
                }
                $preguntas->CorrectAnswers = $temp;   
            }
            $preguntas->Test_id = $test;
            $preguntas->save();
        }
        
        return response()->json(["id"=>$assign->Course_id]);
        
    }
    public function createActivity($id)
    {
        return view('Administration/Teachers/CreateActivity',compact('id'));
    }
    public function saveActivity(Request $request,$id)
    {
        $user = user::find($request->session()->get('User_id')); 
        $data = $request->data[0];
        $Actividad = $data['Actividad'];
        $Punteo = $data['Punteo'];
        $assignA = new Assign_activity;
        $assignA->Name = $Actividad;
        $assignA->Score = $Punteo;
        $assignA->Course_id = $id;
        $assignA->State = "Active";
        $assignA->save();
        $log = new logs;
        $log->Table = "Voluntario";
        $log->User_ID = $user->name;
        $log->Description = "Se creo la nueva actividad: ".$Actividad;
        $log->Type = "Create";
        $log->save();
        return response()->json(["Accion completada"]);

    }
    public function DetailActivity($curso,$id)
    {
        $course = course::find($curso);
        $Titles =['Id','Actividad','Examenes de la actividad','Punteo Total','Acciones'];
        $Models = [];
        $actividad = Assign_activity::find($id);
        $test = Assign_activity::find($id)->Tests();
        foreach ($test as $value) {
            $data = [
                'Test' => $value->Title,
            ];
            array_push($Models,$data);
        }
        return view('Administration/Teachers/detailActivity',compact('actividad','course','Titles','Models'));
    }
    public function updateActivity(Request $request)
    {
        $user = user::find($request->session()->get('User_id')); 
        $data = $request->data[0];
        $Actividad = $data['Actividad'];
        $Punteo = $data['Punteo'];
        $id = $data['code'];
        $curso = $data['curso'];
        $assign = Assign_activity::find($id);
        $assign->Name = $Actividad;
        $assign->Score = $Punteo;
        $assign->save();
        $log = new logs;
        $log->Table = "Voluntario";
        $log->User_ID = $user->name;
        $log->Description = "Se actualizo la actividad: ".$Actividad;
        $log->Type = "Update";
        $log->save();
        return response()->json(["Accion completada"]);
    }
    public function deleteActivity($curso, $id, Request $request)   //ELIMINAR/DESACTIVAR VOLUNTARIO
    {
        $IID = user::find($request->session()->get('User_id'));
        $r = Assign_activity::find($id);
        $dataU=array(
            'State' => 'Desactivated',
        );
        $log = new logs;
        $log->Table = "Voluntario";
        $log->User_ID = $IID->name;
        $log->Description = "La Actividad: ".$r->Name." fue desactivado";
        $log->Type = "Delete";
        $log->save();
        Assign_activity::where('id',$id)->update($dataU);
        return redirect()->route('ScoreTeacher', [$curso]);
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