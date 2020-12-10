<?php

namespace App\Http\Controllers;
use DateTime;
use DateTimeZone;
use Session;
use Illuminate\Http\Request;
//tabla de informacion
use App\Models\information;
//tabla de asignacion de informacion
use App\Models\Assign_files_information;
//tabla de notas
use App\Models\Note;
//tabla de evaluaciones
use App\Models\test;
//tabla de preguntas
use App\Models\Question;
//tabla de asignacion de preguntas a prueba
use App\Models\Asign_question_test;
//tabla de asignacion de preguntas a prueba
use App\Models\Asign_answer_test_student;
//tabla de asignacion de prueba a curso
use App\Models\Asign_test_course;
//tabla de asignacion de estudiante grado
use App\Models\Assign_student_grade;
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
    public function workspace($id)
    {
        $course=course::find($id);
        $buttons =[];
        $button = [
            "Name" => 'Info',
            "Link" => '#',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $teacher = $course->Teacher();
        
        $vol = "No asignado";
        if($teacher)
        {
            $vol = $teacher->person()->Names." ".$teacher->person()->LastNames;
        }
            $model= [
            "Course"=>$course->Name,
            "Teacher"=>$vol,
            "Info"=>" ",
            "Students"=> count($course->Grade()->Students()),
            "Test"=> $course->Tests(),
        ];
        return view('Administration/Teachers/spaceWork',compact('buttons','model'));
    }
    public function __construct()
	{
		$this->middleware('auth');
	} 
    public function workspaceT(Request $request, $id)
    {
        $id = User::find($request->session()->get('User_id'));
        $course = course::find($id);
        $info = [];
        $grade = grade::find($curse->Grade_id)->Period();
        $students = Assign_student_grade::where([['Grade_id',$curse->Grade_id],['State','Active']])->get();
        $tests = Asign_test_course::where('Teacher_id',$value->id)->get();
        $info = [
            "curso" => $curse->Name,
            "Period" => $grade->Name,
            "Students" => count($students),
            "Tests" => count($tests),
        ];
        $teacher = Person::find($id->Person_id);
        return view('/Teacher/spaceWork',compact('info','teacher','id'));
    }
    public function dashboard(Request $request)
    {
        $Titles =[];
        $Models = [];
        $data = User::find($request->session()->get('User_id'));
        $DataTeacher=[];
        if($data)
        {
            $DataTeacher=[
                "CountPeriods" => count($data->CountTeacherPeriods()),
                "CountGrades" => count($data->CountTeacherGrades()),
                "CountCourses" => count($data->CoursesTeacherData()),
                "CountTest" =>count($data->CoursesTeacherData()),
            ];
            $dataActivity = [];
            $dataTest = [];
            $dataAll = [];
            $TestData =[];
            foreach($data->CoursesTeacherData() as $value)
            {
                $Activities = Assign_activity::where([['Course_id',$value->id],['State','Active']])->get();
                foreach($Activities as $Activity)
                {
                    if(!in_array($Activity->Name,$dataActivity))
                    {
                        array_push($dataActivity,$Activity->Name);
                        $act = [
                            "Name" =>$Activity->Name,
                            "No" =>count($Activity->Tests()) ?? 0,
                        ];
                        array_push($Titles,$act);
                    }
                    if(count($Activity->Tests())>0)
                    {
                        foreach($Activity->Tests() as $test)
                        {
                            if(!in_array($test->Title,$TestData))
                            {
                                $dat = [
                                    "Activity"=>$Activity->Name,
                                    "Test" =>$test->Title
                                ];
                                    
                                array_push($TestData,$dat);
                            }
                        }
                    }
                    else
                    {
                        $dat = [
                            "Activity"=>$Activity->Name,
                            "Test" =>"No existen examenes asignados"
                        ];
                         array_push($TestData,$dat);
                    }
                }
                foreach($value->Grade()->Students() as $student)
                {
                    $notes = Note::where(['Student_id'=> $student->Asssign_Grade()->id, "Course_id" => $value->id])->get();
                    $model = [
                        "Name"=> $student->LastNames." ".$student->Names,
                        "Curse"=>$value->Name,
                        "Notes" =>"0"
                    ];
                }
            }
        }
        $tests=[];  
        $Qualifieds = [];
        $Approveds = [];  
        $course = Asign_teacher_course::where('user_id',$data->id)->get();

        #========== BUSCA EXÁMENES PROGRAMADOS =============
        if(!$course->isEmpty()){
            foreach ($course as $value) {
                $actividades = Assign_activity::where([['Course_id',$value->Course_id],['State','Active']])->first();
                $mcourse = Course::find($value->Course_id);
                if (isset($actividades)) {
                    $examenes = test::where([['Activity_id',$actividades->id],['State','Active']])->get();
                    foreach ($examenes as $value) {
                        $fechafinal = explode(" ", $value->EndDate);
                        $fechaInicial = explode(" ", $value->StartDate);
                        $horafinal = $fechafinal[1].' '.$fechafinal[2];
                        $horaInicial = $fechaInicial[1].' '.$fechaInicial[2];
                        $horaactual = date("g").':'.date("i").' '.date("A");
                        $actual = new DateTime();
                        if(date($fechafinal[0]) > $actual->format('m/d/Y')){
                            setlocale(LC_TIME, "spanish");
                            $newDate = date("d-m-Y", strtotime($value->StartDate));	
                            $Inicio = strftime("%d de %B del %Y", strtotime($newDate));
                            $newDateFinal = date("d-m-Y", strtotime($value->EndDate));	
                            $Final = strftime("%d de %B del %Y", strtotime($newDateFinal));
                            $data=[
                                "id" => $value->id,
                                "examen" => $value->Title,
                                "Curso" => $mcourse->Name ." - ". $mcourse->Grade()->GradeName()." - ".$mcourse->Grade()->Period()->Name,
                                "FI" => $Inicio.' '.$horaInicial,
                                "FF" => $Final.' '.$horafinal,
                            ];
                            array_push($tests,$data);
                        }
                        else if (date($fechafinal[0]) == $actual->format('m/d/Y') && $horafinal > $horaactual) {
                            setlocale(LC_TIME, "spanish");
                            $newDate = date("d-m-Y", strtotime($value->StartDate));	
                            $Inicio = strftime("%d de %B del %Y", strtotime($newDate));
                            $newDateFinal = date("d-m-Y", strtotime($value->EndDate));	
                            $Final = strftime("%d de %B del %Y", strtotime($newDateFinal));
                            $data=[
                                "id" => $value->id,
                                "examen" => $value->Title,
                                "Curso" => $mcourse->Name ." - ". $mcourse->Grade()->GradeName()." - ".$mcourse->Grade()->Period()->Name,
                                "FI" => $Inicio.' '.$horaInicial,
                                "FF" => $Final.' '.$horafinal,
                            ];
                            array_push($tests,$data);
                        }
                    }
                }
            }
        }
        #======== BUSCA QUALIFIED ==================
        if(!$course->isEmpty()){
            foreach ($course as $value) {
                $qualified = Note::where([['Course_id',$value->Course_id],['State','Qualified']])->first();
                $approved = Note::where([['Course_id',$value->Course_id],['State','Approved']])->first();
                $mcourse = Course::find($value->Course_id);
                if (isset($qualified)) {
                    setlocale(LC_TIME, "spanish");
                    $newDate = date("d-m-Y", strtotime($qualified->updated_at));	
                    $Revision = strftime("%d de %B del %Y", strtotime($newDate));
                    $data=[
                        "Curso" => $mcourse->Name ." - ". $mcourse->Grade()->GradeName()." - ".$mcourse->Grade()->Period()->Name,
                        "Revision" => $Revision,
                    ];
                    array_push($Qualifieds,$data);
                }
                else if (isset($approved)) {
                    setlocale(LC_TIME, "spanish");
                    $newDate = date("d-m-Y", strtotime($approved->updated_at));	
                    $Revision = strftime("%d de %B del %Y", strtotime($newDate));
                    $data=[
                        "Curso" => $mcourse->Name ." - ". $mcourse->Grade()->GradeName()." - ".$mcourse->Grade()->Period()->Name,
                        "Revision" => $Revision,
                    ];
                    array_push($Approveds,$data);
                }
            }
        }
        return view('Teacher/Home',compact('Titles','Models','DataTeacher','TestData','tests','Approveds','Qualifieds'));
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
        $Titles =['Id','Nombres','Apellidos','Telefono','Usuario','Email','Cursos Asignados','Ultima conexión','Acciones'];
        $usuario_rol = Assign_user_rol::where([['Rol_id',3],['State','Active']])->get('user_id');
        $Models = [];
        foreach ($usuario_rol as $v) {
            $usuario = User::find($v->user_id);
            $persona = Person::find($usuario->Person_id);
            // $curses = User::find($v->user_id)->CoursesTeacher();
            $curses = Asign_teacher_course::where([['user_id',$v->user_id],['State','Active']])->get();
            $dataT = [];
            foreach ($curses as $value) {
                $curso = course::find($value->Course_id);
                $dataC = [
                    'Curso' => $curso->Name." - ".$curso->Grade()->GradeNamePeriod(),
                ];
                array_push($dataT,$dataC);
            }
            $conection = logs::where(['Type'=>'Login','User_Id'=>$usuario->name])->orderby('created_at','DESC')->take(1)->first();
                if($conection)
                {
                    setlocale(LC_TIME, "spanish");
                    $newDate = date("d-m-Y", strtotime($conection->created_at));	
                    $mes = strftime("%d de %B del %Y", strtotime($newDate));
                    $conection= $mes." a las ".date("H:m A", strtotime($conection->created_at));
                }
            $data = [
                'Id' => $persona->id,
                'Name' => $persona->Names,
                'Apellido' => $persona->LastNames,
                'Telefono' => $persona->Phone,
                'Usuario' => $usuario->name,
                'Correo' => $usuario->email,
                'Curses' => $dataT,
                'Conection' => $conection ?? 'El usuario no se ha conectado'
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
        $id = User::find($request->session()->get('User_id')); 
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        $Apellidos= $data['Apellido'];
        $Telefono= $data['Telefono'];
        $Usuario= $data['Usuario'];
        $Email= $data['Email'];
        $Contraseña = $data['Contraseña'];
        $Cursos = $data['Curso'];
        $Cursos = explode(";",$Cursos);
        $masculino = $data['masculino'];
        if(empty($Cursos[0])){
            return response()->json(["Error" => "La asignación de cursos no puede quedar vacia"]);
        }
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
                $registered_user = User::where('name',$Usuario)->first();
                if ($registered_user!=null)
                {
                    return response()->json(['Error' => "El nombre de usuario que ingreso ya esta registrado!"], 500);
                }
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
                    $verificar = Asign_teacher_course::where([['Course_id',$Cursos[$i]],['State','Active']])->first();
                    if (!isset($verificar)) {
                        $usuario_curso = new Asign_teacher_course;
                        $curso = course::find($Cursos[$i]);
                        $grado = grade::find($curso->Grade_id);
                        $usuario_curso->user_id = $user->id;
                        $usuario_curso->Course_id = $Cursos[$i];
                        $usuario_curso->State = "Active";
                        $usuario_curso->Year = date("Y");
                        $usuario_curso->save();
                        #logs registro de asignación
                        $log = new logs;
                        $log->Table = "Voluntario";
                        $log->User_ID = $id->name;
                        $log->Description = "Se asigno el curso ".$curso->Name." del grado ".$grado->GradeName()." al voluntario ".$person->fullname();
                        $log->Type = "Assign";
                        $log->Period_id = $grado->Period()->id;
                        $log->save();
                    }
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
        $id = User::find($request->session()->get('User_id'));
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
        $IID = User::find($request->session()->get('User_id'));
        $r = User::where('Person_id',$id)->first();

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
        Assign_user_rol::where('user_id',$r->id)->update($dataU);
        return redirect()->route('ListTeacher');
    }
    public function changePassword(Request $request, $id)
    {
        $data = $request->data[0];
        if($data['Contraseña'] == null){
            return response()->json(["id"=>"La contraseña no puede estar vacia"]);
        }
        $user = User::where('Person_id',$id)->first();
        $user->PasswordRestore = "Change";
        $user->password = bcrypt($data['Contraseña']);
        $user->Save();
        return response()->json(["Accion completada"]);
    }

    public function score(Request $request, $id)      //VISUALIZACIÓN DE NOTAS DE LAS UNIDADES
    {
        $Models = [];
        $buttons =[];
        $Titles = [];
        $Modal = [];
        if(session()->get('rol_Name')=="Voluntario"){
            $teacher = $request->session()->get('User_id');
            $assignV = Asign_teacher_course::where('Course_id',$id)->first();
            if(isset($assignV)){
                $course = course::find($assignV->Course_id);
                $userV = User::find($assignV->user_id);
                $vol = Person::find($userV->id);
            }else{
                return redirect('/teacher/home/dashboard')->withError('No tiene cursos asignados');
            }
        } else {
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
            $course = course::find($id);
            $assignV = Asign_teacher_course::where('Course_id',$id)->first();
            if(isset($assignV)){
                $userV = User::find($assignV->user_id);
                $vol = $userV->person();
            }else{
                return redirect('/administration/teacher/list')->withError('El curso no tiene ningún voluntario asignado');
            }
        }
        $Activities = Assign_activity::where([['Course_id',$course->id],['State','Active']])->get();
        if(!$Activities->isempty()){
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
            }
                foreach($gradeStudents as $student)
                {
                    $notas=[];
                    foreach($Activities as $Activity)
                    {
                        if(count($Activity->Tests())>0)
                        {
                            foreach($Activity->Tests() as $v)
                            {
                                // $assign = Assign_student_grade::where([['user_id',$student->id],['State','Active']])->first();
                                $note = Note::where([['Test_id',$v->id],['Student_id',$student->Asssign_Grade()->id]])->first();
                                if($note==null){
                                    array_push($notas,0);
                                }
                                else if($note->State == "Pre-Qualified" || $note->State == "Complete" || $note->State == "Qualified" || $note->State == "Approved"){
                                    array_push($notas,$note->Score);
                                }else{
                                    array_push($notas,"El examen no se ha calificado");
                                }
                            }
                        }
                        else
                        {
                            array_push($notas,"-");
                        }
                    }
                    $model =[
                        'Alumno' => $student->person()->Names." ".$student->person()->LastNames,
                        'Notas' =>$notas,
                    ];
                    array_push($Models,$model);
                }
            
        }
        
        $button = [
            "Name" => 'Enviar notas a revisión',
            "Link" => '/teacher/send/state/test/'.$id,
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $Nombre = $vol->Names.' '.$vol->LastNames;
        $grado = grade::find($course->Grade_id)->GradeName();
        if(session()->get('rol_Name')=="Voluntario"){
            return view('Teacher/listadoNotas',compact('buttons','Modal','Titles','Models','Nombre','course','grado'));
        }else{
            return view('Administration/Teachers/listadoNotas',compact('buttons','Modal','Titles','Models','Nombre','course','grado'));
        }
    }
    function TestScore(Request $request,$id) 
    {
        $Models = [];
        $buttons =[];
        $Titles = [];
        $Modal = [];
        $teacher = User::find($request->session()->get('User_id'));
        $vol = $teacher->Person();
        $course = course::find($id);
        $Activities = Assign_activity::where([['Course_id',$course->id],['State','Active']])->get();
        if(!$Activities->isempty()){
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
            }
            foreach($gradeStudents as $student)
            {
                $notas=[];
                foreach($Activities as $Activity)
                {
                    if(count($Activity->Tests())>0)
                    {
                        foreach($Activity->Tests() as $v)
                        {
                            $assign = Assign_student_grade::where([['user_id',$student->id],['State','Active']])->first();
                            $notes = Note::where([['Test_id',$v->id],['Student_id',$assign->id]])->first();
                            if($v->State == "Fisico"){
                                if($notes==null){
                                    $n=["Student_id" => "Fisico", "Student"=>$assign->id, "Curso_id"=>$id,"Test_id"=> $v->id, "Punteo"=> "0/".$v->Score];
                                    array_push($notas,$n);
                                } 
                                elseif($notes->State == "Pre-Qualified"){
                                    $n=["Student_id" => "Fisico", "Student"=>$assign->id, "Curso_id"=>$id,"Test_id"=> $v->id, "Punteo"=> $notes->Score.'/'.$v->Score];
                                    array_push($notas,$n);
                                }
                                elseif($notes->State == "Qualified" || $notes->State == "Approved"){
                                    $n=["Student_id" => "Pre" ,"Test_id"=> "Pre"];
                                    array_push($notas,$n);
                                }
                            }
                            else{
                                if($notes==null){
                                    $n=["Student_id" => "0" ,"Test_id"=> "0"];
                                    array_push($notas,$n);
                                } 
                                elseif($notes->State == "Pre-Qualified" || $notes->State == "Qualified" || $notes->State == "Approved"){
                                    $n=["Student_id" => "Pre" ,"Test_id"=> "Pre"];
                                    array_push($notas,$n);
                                }
                                else{
                                    $n=["Student_id" => $assign->id,"Test_id"=>$v->id, "Curso_id"=>$id];
                                    array_push($notas,$n);
                                }
                            }
                        }
                    }
                    else
                    {
                        $n=["Student_id" => 'No',"Test_id"=>'No'];
                        array_push($notas,$n);
                    }
                }
                $model =[
                    'Alumno' => $student->person()->Names." ".$student->person()->LastNames,
                    'Notas' =>$notas,
                ];
                array_push($Models,$model);
            }
        }
        $Nombre = $vol->Names.' '.$vol->LastNames;
        $grado = grade::find($course->Grade_id)->GradeName();
        return view('Teacher/Test/ListTestScore',compact('Modal','Titles','Models','Nombre','course','grado'));
    }
            #===================    CRUD EXAMENES ================
    public function TestTeacher(Request $request,$id)   //VISTA DE EXAMENES DE UN CURSO
    {
        $buttons =[];
        if (session()->get('rol_Name')=="Voluntario") {
            $teacher = $request->session()->get('User_id');
            $assignV = Asign_teacher_course::where([['Course_id',$id],['State','Active']])->first();
            if(isset($assignV)){
                $course = course::find($assignV->Course_id);
                $vol = Person::find($teacher);
                $button = [
                    "Name" => 'Crear Examen',
                    "Link" => 'teacher/create/test/'."$course->id",
                    "Type" => "add"
                ];
                array_push($buttons,$button);
            }else{
                return redirect('/teacher/home/dashboard')->withError('No tiene cursos asignados');
            }
        } else{
            $assign = Asign_teacher_course::where([['Course_id',$id],['State','Active']])->first();
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
            if(isset($assign->user_id)){
                $userV = User::find($assign->user_id);
                $vol = Person::find($userV->Person_id);
                $course = course::find($id);
            }else{
                return redirect('/administration/teacher/list')->withError('El curso no tiene ningún voluntario asignado');
            }
        }
        $Titles = [];
        $Models = [];
        $Activities = Assign_activity::where([['Course_id',$course->id],['State','Active']])->get();
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
                    "Tipo" => $Test->State,
                    "NoQuestions" => $Test->NoQuestions(),
                ];
                array_push($Models,$model);
            }
            array_push($Titles,$act);
        }
        
        $grado = grade::find($course->Grade_id)->GradeName();
        $Nombre = $vol->Names .' '.$vol->LastNames;
        if (session()->get('rol_Name')=="Voluntario") {
            return view('Teacher/ViewTests',compact('Titles','buttons','Nombre','course','grado','Models'));
        } else {
            return view('Administration/Teachers/ViewTests',compact('Titles','buttons','Nombre','course','grado','Models'));
        }
    }
    public function QuestionTest($id,$curso)   #VER PREGUNTAS DE UN EXAMEN
    {
        $test = test::find($id);
        $questions = Question::where('Test_id',$id)->get();
        $Models = [];
        
        if (session()->get('rol_Name')=="Voluntario") {
            return view('Teacher/QuestionTest',compact('test','questions','curso'));
        }else{
            return view('Administration/Teachers/QuestionTest',compact('test','questions','curso'));
        }
    }
    public function QualifyTest($id,$idtest,$course)
    {
        $test = test::find($idtest);
        $note = Note::where([['Student_id',$id],['Test_id',$idtest]])->first();
        $nota = $note->id;
        $Models = [];
        foreach ($test->Questions() as $value) {
            $answers = Asign_answer_test_student::where([['Studen_id',$id],['Question_id',$value->id],['State','Complete']])->first();
            if($answers==null){
                return redirect('/teacher/home/dashboard')->withError('Examen ya calificado');
            }
            $data = [
                'id' => $answers->id,
                'Pregunta' => $value->Title,
                'valor' => $value->Score,
                'Tipo' => $value->Type,
                'Title' => $value->Title,
                'Content' => $value->Content,
                'RespuestaC' => $value->CorrectAnswers,
                'RespuestaE' => $answers->Answers,
                'Punteo' => $answers->Score,
            ];
            array_push($Models,$data);
        }
        return view('Teacher/QualifyTestStudent',compact('test','Models','nota','course'));
    }
    public function SaveQualifyTest(Request $request)
    {
        $data = $request->data;
        $id = $request->id;
        $total = 0;
        foreach ($data as $value){
            $value = $value[0];
            $respuesta = Asign_answer_test_student::find($value['id']);
            $question = Question::find ($respuesta->Question_id);
            if ($question->Score < $value['Punteo']) {
                return response()->json(["Error"=>"La calificación excede el punteo de la pregunta: ".$question->Title]);
            }
            if($value['Punteo'] == " " || $value['Punteo'] < 0) {
                return response()->json(["Error"=>"El punteo no puede ser vacio o negativo en la pregunta: ".$question->Title]);
            }
            $total += $value['Punteo'];
            $respuesta->Score = $value['Punteo'];
            $respuesta->State = "Qualified";
            $respuesta->save();
        }
        $nota = Note::find($id);
        $nota->State = "Pre-Qualified";
        $nota->Score = $total;
        $nota->save();
        return response()->json("Accion Completada");
    }
    public function SendQualify(Request $request,$id)
    {
        $course = course::find($id);
        $Activities = Assign_activity::where([['Course_id',$course->id],['State','Active']])->get();
        if(!$Activities->isempty()){
            $gradeStudents = grade::find($course->Grade_id)->Students();
            foreach($gradeStudents as $student)
            {
                $notas=[];
                foreach($Activities as $Activity)
                {
                    if(count($Activity->Tests())>0)
                    {
                        foreach($Activity->Tests() as $v)
                        {
                            $assign = Assign_student_grade::where([['user_id',$student->id],['State','Active']])->first();
                            $notes = Note::where([['Test_id',$v->id],['Student_id',$assign->id]])->first();
                            if($v->State == "Fisico"){
                                if($notes==null){
                                    return redirect('/teacher/test/score/'.$id)->withError('El examen: '.$v->Title.' del estudiante: '.$student->name.' aún no ha sido calificado');
                                }
                            }
                            else{
                                if($notes==null){
                                    if(!isset($notes)){
                                        $Qual = new Note;
                                        $Qual->Student_id = $assign->id;
                                        $Qual->Course_id = $id;
                                        $Qual->Score = 0;
                                        $Qual->Year = date("Y");
                                        $Qual->State = "Qualified";
                                        $Qual->Test_id = $v->id;
                                        $Qual->Save();
                                    }
                                } 
                            }
                        }
                    }
                }
            }
        }
        $nota = Note::where('Course_id',$id)->get();
        if($nota->isempty()){
            return redirect('/teacher/score/list/'.$id)->withError('No existen notas de examenes calificados');
        }
        foreach ($nota as $value) {
            // if (($value->State != 'Qualified') || ($value->State != 'Pre-Qualified') || ($value->State != 'Approved')) {
            if ($value->State == 'Complete') {
                $test = test::find($value->Test_id);
                $assignT = Assign_student_grade::find($value->Student_id);
                $student = User::find($assignT->user_id)->person();
                return redirect('/teacher/test/score/'.$id)->withError('El examen: '.$test->Title.' del estudiante: '.$student->Names.' '.$student->LastNames.' aún no ha sido calificado');
            }
        }
        foreach ($nota as $n) {
            if ($n->State == 'Pre-Qualified'){
                $n->State = "Qualified";
                $n->save();
            }
        }
        Session::put([
            'message' => "Notas de: $course->Name enviadas al circulo de estudio",
             ]);
        return redirect('/teacher/score/list/'.$id);
    }
    public function createExam($id)
    {
        $actividad = Assign_activity::where('Course_id',$id)->where('State','Active')->get();
        if ($actividad->isempty()) {
            if(session()->get('rol_Name')=="Voluntario"){
                return redirect('/teacher/score/list/'.$id)->withError('El curso no tiene actividades creadas');
            }else{
                return redirect('/administration/teacher/score/'.$id)->withError('El curso no tiene actividades creadas');
            }
        } else {
            $actividades=[];
            foreach ($actividad as $value) {
                $data = [
                    'id' => $value->id,
                    "Nombre" => $value->Name,
                ];
                array_push($actividades,$data);
            }
            if(session()->get('rol_Name')=="Voluntario"){
                return view('Teacher/CreateTest',compact('id','actividades'));
            }else{
                return view('Administration/Teachers/CreateTest',compact('id','actividades'));
            }
        }
        
    }
    public function saveExam(Request $request)
    {
        $id = User::find($request->session()->get('User_id'));
        $persona = Person::find($id->Person_id);
        $data = $request->data[0];
        $Titulo = $data['Titulo'];
        $Punteo = $data['Punteo'];
        $actividad = $data['actividad'];
        $curso = $data['curso'];
        $c = course::find($curso);
        $total = $Punteo;
        $grado = grade::find($c->Grade_id);
        $activity = Assign_activity::find($actividad);
        $scores = test::where([['Activity_id',$actividad],['State','Fisico']])->orWhere([['Activity_id',$actividad],['State','Active']])->get();
        foreach ($scores as $value) {
            $total += $value->Score;
        }
        if($Titulo == ""){
            return response()->json(["Error"=>"El nombre del examen no puede quedar vacio"]);
        }
        else if($Punteo <= 0){
            return response()->json(["Error"=>"El punteo debe ser mayor a 0"]);
        }
        else if($actividad == null){
            return response()->json(["Error"=>"Seleccione un actividad"]);
        }
        else if (intval($total) > $activity->Score) {
            return response()->json(["Error"=>"El o los exámenes creados exceden el punteo de la actividad, Punteo total de la actividad: ".$activity->Score]);
        } else {
            if ($data['tipoexamen'] == 'true') {
                if ($data['Preguntas'] <= 0) {
                    return response()->json(["Error"=>"Ingrese una cantidad valida de preguntas"]);    
                }
                elseif($data['Preguntas'] > 25){
                    return response()->json(["Error"=>"Vaya!, demasiadas preguntas, prueba con 25"]);    
                }
                $Fechas = explode(' - ',$data['Fechas']);
                $HoraI = $data['HoraI'];
                $HoraF = $data['HoraF'];
                $actual = new DateTime(null, new DateTimeZone('America/Guatemala'));
                try {
                    DB::beginTransaction();
                    $examen = new test;
                    $examen->Title = $Titulo;
                    $examen->Score = $Punteo;
                    $examen->StartDate = $Fechas[0].' '.$HoraI;
                    $examen->EndDate = $Fechas[1].' '.$HoraF;
                    $examen->Activity_id = $actividad;
                    $examen->Order = $data['OrderQuestions'];
                    $examen->Year = date("Y");
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
                    $log->Description = "El usuario ".$id->name." creo un nuevo examen virtual para el curso de ".$c->Name." de ".$grado->GradeName();
                    $log->Type = "Create";
                    $log->Period_id = $grado->Period()->id;
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
                    $examen->Year = date("Y");
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
                    $log->Description = "El usuario ".$id->name." creo un nuevo examen fisico para el curso de ".$c->Name." de ".$grado->GradeName();
                    $log->Type = "Create";
                    $log->Period_id = $grado->Period()->id;
                    $log->save();
                    DB::commit();
                }catch (Exception $e) {
                    DB::rollBack();
                }
                return response()->json(["Accion Completada"]);
            }
        }        
    }
    public function AssignQuestion($id,$preguntas)
    {
        if(session()->get('rol_Name')=="Voluntario"){
            return view('Teacher/Test/AssignQuestionTeacher',compact('id','preguntas'));
        }else{
            return view('Administration/Tests/1',compact('id','preguntas'));   
        }
    }
    public function SaveAssignQuestion(Request $request)
    {
        $data = $request->data;
        $test = $request->ID;
        $scoreT = test::find($test);
        $assignTest = Asign_test_course::where('Test_id',$test)->first();
        $assign = Asign_teacher_course::find($assignTest->Teacher_id);
        $total = 0;
        foreach ($data as $value) {
            $value = $value[0];
            $total += $value['Punteo'];
        }
        if ($total > $scoreT->Score) {
            return response()->json(["Error"=>"La suma total del punteo de las preguntas es mayor al punteo total del examen: ".$scoreT->Score]);
        }
        else if($total < $scoreT->Score){
            return response()->json(["Error"=>"La suma del punteo de las preguntas es menor al punteo total del examen: ".$scoreT->Score]);
        }
        else{
            foreach ($data as $value) {
                $value = $value[0];
                $preguntas = new Question;
                $preguntas->Title = $value['Titulo'];
                $preguntas->Content = $value['Contenido'];
                $preguntas->Score = $value['Punteo'];
                $preguntas->Type = $value['TipoPregunta'];
                if ($value['TipoPregunta'] == 'Multiple') {
                    $temp = "";
                    $preguntas->CorrectAnswers = $value['Respuesta'];
                    for ($i=0; $i < count($value['PosibleR']) ; $i++) { 
                        $temp = $temp . $value['PosibleR'][$i] . ',';
                    }
                    $preguntas->Answers = $temp;
                }
                else if($value['TipoPregunta'] == 'V/F'){
                    $preguntas->CorrectAnswers = $value['RespuestaVF'];;
                }
                $preguntas->Test_id = $test;
                $preguntas->save();
            }
            return response()->json(["id"=>$assign->Course_id]);
        }
        
    }
    public function SaveScorePhysic(Request $request)
    {
        $data = $request->data[0];
        $student = $data['Estudiante'];
        $course = $data['Curso'];
        $test = $data['Test'];
        $score = $data['Punteo'];
        $examen = test::find($test);
        if($score == "" || $score < 0){
            return response()->json(["Error"=>"Ingrese un punteo valido"]);
        }
        elseif($score > $examen->Score){
            return response()->json(["Error"=>"El punteo es mayor al punteo total del examen: ".$examen->Score]);
        }
        else{
            $verificar = Note::where([['Student_id',$student],['Course_id',$course],['Test_id',$test]])->first();
            if(isset($verificar)){
                $verificar->Score = $score;
                $verificar->save();
                return response()->json("Accion Completada");    
            }
            else{
                $note = new Note;
                $note->Student_id = $student;
                $note->Score = $score;
                $note->Course_id = $course;
                $note->State = "Pre-Qualified";
                $note->Year = date("Y");
                $note->Test_id = $test;
                $note->Save();
                return response()->json("Accion Completada");    
            }
            
        }
        
    }
    public function createActivity($id)
    {
        return view('Administration/Teachers/CreateActivity',compact('id'));
    }
    public function saveActivity(Request $request,$id)
    {
        $user = User::find($request->session()->get('User_id')); 
        $data = $request->data[0];
        $Actividad = $data['Actividad'];
        $Punteo = $data['Punteo'];
        if($Punteo < 1 || $Punteo > 100 || $Actividad == ""){
            return response()->json(["id"=>"Ingrese un nombre valido o un punteo entre 1 y 100"]);
        }else{
            $verificar = Assign_activity::where([['Course_id',$id],['State','Active']])->get();
            foreach ($verificar as $value) {
                if($value->Name == $Actividad){
                    return response()->json(["id"=>"El nombre de la actividad ya existe"]);
                }
            }
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
            $log->Period_id = course::find($id)->Grade()->Period()->id;
            $log->save();
            return response()->json(["Acción Completada"]);
        }
    }
    public function DetailActivity($curso,$id)
    {
        if ($id == 0) {
            return redirect('/administration/teacher/score/'.$curso)->withError('No hay actividades asignadas');
        } else {
            $course = course::find($curso);
            $Titles =['Id','Actividad','Examenes de la actividad','Punteo Total','Acciones'];
            $Models = [];
            $actividad = Assign_activity::find($id);
            $test = Assign_activity::find($id)->Tests();
            if(count($test) == 0){
                $data = [
                    'Test' => 'No existen examenes creados',
                ];
                array_push($Models,$data);
            }else{
                foreach ($test as $value) {
                    $data = [
                        'Test' => $value->Title.' - '.$value->Score.' pts',
                    ];
                    array_push($Models,$data);
                }
            }
            if(session()->get('rol_Name')=="Voluntario"){
                return view('Teacher/detailActivity',compact('actividad','course','Titles','Models'));
            }else{
                return view('Administration/Teachers/detailActivity',compact('actividad','course','Titles','Models'));
            }
        }
    }
    public function updateActivity(Request $request)
    {
        $user = User::find($request->session()->get('User_id')); 
        $data = $request->data[0];
        $Actividad = $data['Actividad'];
        $Punteo = $data['Punteo'];
        $id = $data['code'];
        $curso = $data['curso'];
        if($Punteo < 1 || $Punteo > 100 || $Actividad == ""){
            return response()->json(["id"=>"Ingrese datos validos o un punteo entre 1 y 100"]);
        }else{
            $assign = Assign_activity::find($id);
            $assign->Name = $Actividad;
            $assign->Score = $Punteo;
            $assign->save();
            $log = new logs;
            $log->Table = "Voluntario";
            $log->User_ID = $user->name;
            $log->Description = "Se actualizo la actividad: ".$Actividad;
            $log->Period_id = $assign->Course()->Grade()->Period()->id;
            $log->Type = "Update";
            $log->save();
            return response()->json(["Accion completada"]);
        }
    }
    public function deleteActivity($curso, $id, Request $request)   //ELIMINAR/DESACTIVAR VOLUNTARIO
    {
        $IID = User::find($request->session()->get('User_id'));
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
        
        if (session()->get('rol_Name')=="Voluntario") {
            return redirect()->route('TeacherScore',$curso);
        }else{
            return redirect()->route('ScoreTeacher',$curso);
        }
    }
    public function ViewTestsGeplande($id)
    {
        $Titles = ['id','Examen','Fecha y hora de Inicio','Fecha y hora de Final'];
        $Models=[];        
        $actividades = Assign_activity::where([['Course_id',$id],['State','Active']])->first();
        if (isset($actividades)) {
            $examenes = test::where([['Activity_id',$actividades->id],['State','Active']])->get();
            foreach ($examenes as $value) {
                $fechafinal = explode(" ", $value->EndDate);
                $horafinal = $fechafinal[1].' '.$fechafinal[2];
                $horaactual = date("g").':'.date("i").' '.date("A");
                $actual = new DateTime();
                if(date($fechafinal[0]) > $actual->format('m/d/Y')){
                    $data=[
                        "id" => $value->id,
                        "examen" => $value->Title,
                        "FI" => $value->StartDate,
                        "FF" => $value->EndDate,
                    ];
                    array_push($Models,$data);
                }
                else if (date($fechafinal[0]) == $actual->format('m/d/Y') && $horafinal > $horaactual) {
                    $data=[
                        "id" => $value->id,
                        "examen" => $value->Title,
                        "FI" => $value->StartDate,
                        "FF" => $value->EndDate,
                    ];
                    array_push($Models,$data);
                }
            }
        }
        return view('Teacher/geplandeTests',compact('Titles','Models'));
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
        $IID = User::find($request->session()->get('User_id'));
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
        $Titles =['Id del registro','Usuario Responsable','Descripcion','Tipo','Hora y fecha de creacion'];
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

    public function viewProfile(Request $request)
    {
        $Titles = ['Titulo','Contenido'];
        $user = User::find($request->session()->get('User_id')); 
        $person = Person::find($user->Person_id);
        $curses = Asign_teacher_course::where([['user_id',$user->id],['State','Active']])->get();
        $dataT = [];
        foreach ($curses as $value) {
            $curso = course::find($value->Course_id);
            $dataC = [
                'Curso' => $curso->Name." - ".$curso->Grade()->GradeNamePeriod(),
            ];
            array_push($dataT,$dataC);
        }
        $info = [
            'titulo' => 'Cursos Asignados',
            'cursos' => $dataT,
        ];
        $data = [
            'Email' => $user->email,
            'Phone' => $person->Phone,
            'Name' => $person->Names,
            'LastNames' => $person->LastNames,
            'User' => $user->name,
            
        ];
        return view('/Teacher/Profile',compact('info','data','Titles'));
    }
    public function SaveviewProfile(Request $request)
    {
        $user = User::find($request->session()->get('User_id')); 
        $person = Person::find($user->Person_id);
        $data = $request->data[0];
        $telefono = $data['Telefono'];
        $correo = $data['Email'];
        if($telefono == "" || $correo ==""){
            return response()->json(["Error"=>"Los campos no pueden estar vacios"]);
        }
        $user->email = $correo;
        $user->save();
        $person->Phone = $telefono;
        $person->save();
        return response()->json(["Accion completada"]);
    }
    public function editProfile(Request $request){

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
                "Grade"=>$value->Grade()->GradeName()." / ".$value->Grade()->Period()->Name
            ];
            array_push($courses,$course);
         } 
        return response()->json([
            "Courses" => $courses,
            ]);
    }
    public function TeacherLoadCourse(Request $request)         //Cargar cursos asignados de un voluntario
    {
        $id = $request->session()->get('User_id');
        $assign = Asign_teacher_course::where('user_id',$id)->get();
        // if(count($assign) > 1){
            $courses = [];
            foreach ($assign as $value) {
                $CourseData = course::find($value->Course_id);
                $period = [
                    "Id" =>$CourseData->id,
                    "Name" =>$CourseData->Name.' - '.$CourseData->Grade()->GradeNamePeriod(),
                ];
                array_push($courses,$period);
            }
            return response()->json([
                "Courses" => $courses,
            ]);
        // }    
    }
    public function AdministrationCourses($id)
    {
        $buttons =[];
        $button = [
            "Name" => 'Listado Voluntarios',
            "Link" => 'administration/teacher/list',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $user = User::where('Person_id',$id)->first();
        $assignT = Asign_teacher_course::where([['user_id',$user->id],['State','Active']])->get();
        $cursosasignados = [];
        if(!$assignT->isEmpty()){
            foreach ($assignT as $value) {
                $course = course::find($value->Course_id);
                $data = [
                    'id' => $course->id,
                    "nombre" => $course->Name.' - '.$course->Grade()->GradeNamePeriod(),
                ];
                array_push($cursosasignados,$data);
            }
        }
        return view('Administration/Teachers/AdministrationCourses',compact('buttons','cursosasignados','id'));
    }
    public function SaveAdministrationCourses(Request $request)  #REGISTRO Y ASIGNACIÓN DE VOLUNTARIOS
    {
        $id = User::find($request->session()->get('User_id')); 
        $data = $request->data[0];
        $Cursos = $data['Curso'];
        $code = $data['Code'];
        $vol = User::find($code);
        $Cursos = explode(";",$Cursos);
        if (empty($Cursos[0])) {
            return response()->json(["Error"=>"La asignación no debe estar vacia"]);
        }
        //LOGICA
        try {
              DB::beginTransaction();
                $delCourses=[] ;
                for ($i=0; $i < count($Cursos) ; $i++) {
                    $verificar = Asign_teacher_course::where([['Course_id',$Cursos[$i]],['State','Active']])->first();
                    if(isset($verificar)){
                        array_push($delCourses,$verificar->id);   
                    }
                }
                $delete = Asign_teacher_course::where([['user_id',$code],['State','Active']])->get()->except($delCourses);
                if(!$delete->isempty()){
                    foreach ($delete as $value) {
                        $deleteassign = Asign_teacher_course::find($value->id);
                        $deleteassign->State = "Deactivated";
                        $deleteassign->save();
                    }   
                }
                for ($i=0; $i < count($Cursos) ; $i++) {
                    $verificar = Asign_teacher_course::where([['Course_id',$Cursos[$i]],['State','Active']])->first();
                    if (!isset($verificar)) {
                        $usuario_curso = new Asign_teacher_course;
                        $curso = course::find($Cursos[$i]);
                        $grado = grade::find($curso->Grade_id)->GradeName();
                        $usuario_curso->user_id = $vol->id;
                        $usuario_curso->Course_id = $Cursos[$i];
                        $usuario_curso->Year = date("Y");
                        $usuario_curso->State = "Active";
                        $usuario_curso->save();
                        #logs registro de asignación
                        $log = new logs;
                        $log->Table = "Voluntario";
                        $log->User_ID = $id->name;
                        $log->Description = "Se asigno el usuario: ".$vol->name.
                        " al curso de ".$curso->Name." del grado de ".$grado;
                        $log->Type = "Assign";
                        $log->Period_id = $grado->Period()->id;
                        $log->save();
                    }
                }
                DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(["Accion completada"]);
    }
}