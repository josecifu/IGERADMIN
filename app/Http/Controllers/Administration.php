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
//modelo de niveles de grados
use App\Models\logs;
//modelo de grado
use App\Models\grade;
use Barryvdh\DomPDF\Facade as PDF;
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
use App\Models\test;
use App\Models\Asign_test_course;
//Modelo asignacion de circulo de estudio
use App\Models\Assign_attendant_periods;
use App\Models\Asign_teacher_course;
use App\Models\Assign_activity;

use Session;
use Illuminate\Support\Facades\DB;
use Carbon;

class Administration extends Controller
{
    //Dashboard
    public function Dashboard(Request $request)
    {
        $rol = $request->session()->get('rol_Name');
        if($rol=="Estudiante")
        {
            return redirect('student/home/dashboard');
        }
        elseif($rol=="Voluntario")
        {
            return redirect('teacher/home/dashboard');
        }
        elseif($rol=="Encargado de circulo")
        {
            return redirect('attendant/home/dashboard');
        }
        $Month = [];
        $logs = logs::whereDate('created_at', '=', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        foreach ($logs as $value) {
            setlocale(LC_TIME, "spanish");
            $newDate = date("d-m-Y", strtotime($value->created_at));	
            $mes = strftime("%d de %B del %Y", strtotime($newDate));
            $M = [
                "Type"=>"New",
                "Title"=>"Nuevo ".$value->Table,
                "User" =>$value->User_id,
                "Date" => $mes,
                "Url" => "administration/home/dashboard",
                "State" => "Success"
            ];
            array_push($Month,$M);
        }
        $Week = [];
        $logs = logs::whereDate('created_at', '=', \Carbon\Carbon::now()->format('Y-m-d'))->get();
        foreach ($logs as $value) {
            setlocale(LC_TIME, "spanish");
            $newDate = date("d-m-Y", strtotime($value->created_at));	
            $mes = strftime("%d de %B del %Y", strtotime($newDate));
            $M = [
                "Type"=>"New",
                "Title"=>"Nuevo ".$value->Table,
                "User" =>$value->User_id,
                "Date" => $mes,
                "Url" => "administration/home/dashboard",
                "State" => "Success"
            ];
            array_push($Month,$M);
        }
        $tests = test::latest()
        ->take(10)
        ->get();
        $Tests =[];
        foreach ($tests as  $value) {
            $assign = Asign_test_course::where('Test_id',$value->id)->first();
            $as = Asign_teacher_course::find($assign->Teacher_id);
            $user = user::find($as->user_id);
            setlocale(LC_TIME, "spanish");
            $newDate = date("d-m-Y", strtotime($value->created_at));	
            $mes = strftime("%d de %B del %Y", strtotime($newDate));
            $test = [
                "Title"=>$value->Title,
                "User"=>$user->name,
                "Date"=>$mes,
                "url" => "/administration/teacher/question/".$value->id."/".$value->Course()->id
            ];
            array_push($Tests,$test);
        }
        $Timeline = [];
        $logs = logs::where('Table','Encargado de circulo')->get();
        
        foreach ($logs as $value) {
            setlocale(LC_TIME, "spanish");
            $newDate = date("d-m-Y", strtotime($value->created_at));	
            $time = strftime("%I:%M %P", strtotime($newDate));
            $M = [
                "Time"=>$time,
                "Description"=>$value->Description,
                
            ];
            array_push($Timeline,$M);
        }
        $Logs =[
            "Month" =>$Month,
            "Week" =>[],
            "Days" =>[],
            "Test" => $Tests,
            "Timeline"=>$Timeline,
        ];
        
        return view('Administration.Dashboard.Home',compact('Logs'));
    }
    public function AttendantEdit(Request $request,$id)
    {
        $buttons =[];
        $button = [
            "Name" => 'Listado de encargados de circulo',
            "Link" => 'administration/workspace/attendant',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $ModelsP = Person::find($id);
        $User = User::where('Person_id',$id)->first();
        $ModelsU = [
                'Usuario' => $User->name,
                'Email' => $User->email,
            ];
        return view('Administration/Attendant/Edit',compact('ModelsP','ModelsU','buttons'));
    }
    public function AttendantDeletes(Request $request)
    {
        $buttons =[];
        $button = [
            "Name" => 'Añadir un encargado de circulo',
            "Link" => 'administration/workspace/attendant/create',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver encargados de circulo activos',
            "Link" => 'administration/workspace/attendant/list',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $ModelsData = rol::find(4);
        $Models =[];
        $Titles =['Id','Nombres','Teléfono','Correo electronico',"Usuario","Ultima Conexión",'Circulos encargados','Acciones'];
        $usuario_rol = Assign_user_rol::where('Rol_id',4)->where('State','Active')->get('user_id');
        foreach ($usuario_rol as $v) {
           
            $usuario = User::find($v->user_id);
            if($usuario->State=="Delete")
            {
                $persona = Person::find($usuario->Person_id);
                $periods = Assign_attendant_periods::where([['user_id',$v->user_id],['State','Delete']])->get();
                $dataT = [];
                foreach ($periods as $value) {
                    $period = period::find($value->Period_id);
                    $dataC = [
                        'Circulo' => $period->Name,
                    ];
                    array_push($dataT,$dataC);
                }
                $data = [
                    'Id' => $persona->id,
                    'Name' => $persona->Names,
                    'LastName' => $persona->LastNames,
                    'Phone' => $persona->Phone,
                    'User' => $usuario->name,
                    'Email' => $usuario->email,
                    'Conection' => "$usuario->email",
                    'Attendant' => $dataT,
                ];
                array_push($Models,$data);
                
            }
        }
        $type="Deletes";
        return view('Administration.Attendant.List',compact('buttons','Titles','Models','type'));
    }
    public function AttendantNotes(Request $request, $id)
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
                $userV = user::find($assignV->user_id);
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
                $userV = user::find($assignV->user_id);
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
                                else if($note->State == "Qualified"){
                                    array_push($notas,$note->Score);
                                }else{
                                    array_push($notas,"El examen no se ha sido enviado a revisión");
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
        return view('Administration/Attendant/Notes',compact('buttons','Modal','Titles','Models','Nombre','course','grado'));
    }
    public function AttendantAssign($id)
    {
        $buttons =[];
        $button = [
            "Name" => 'Listado Voluntarios',
            "Link" => 'administration/teacher/list',
            "Type" => "add"
        ];
        $person = Person::find($id);
        array_push($buttons,$button);
        $assignT = Assign_attendant_periods::where([['user_id',$person->User()->id],['State','Active']])->get();
        $PeriodsAssign = [];
        if(!$assignT->isEmpty()){
            foreach ($assignT as $value) {
                $period = period::find($value->Period_id);
                $data = [
                    'id' => $period->id,
                    "name" => $period->Name,
                ];
                array_push($PeriodsAssign,$data);
            }
        }
        return view('Administration/attendant/AssignPeriods',compact('buttons','PeriodsAssign','id'));
    }
    public function AttendantList(Request $request)
    {
        $buttons =[];
        $button = [
            "Name" => 'Añadir un encargado de circulo',
            "Link" => 'administration/workspace/attendant/create',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver encargados de circulo eliminados',
            "Link" => 'administration/workspace/attendant/deletes',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $ModelsData = rol::find(4);
        $Models =[];
        $Titles =['Id','Nombres','Teléfono','Correo electronico',"Usuario","Ultima Conexión",'Circulos encargados','Acciones'];
        $usuario_rol = Assign_user_rol::where('Rol_id',4)->where('State','Active')->get('user_id');
        foreach ($usuario_rol as $v) {
            $usuario = User::find($v->user_id);
            if($usuario->State=="Active")
            {
                $persona = Person::find($usuario->Person_id);
                $periods = Assign_attendant_periods::where([['user_id',$v->user_id],['State','Active']])->get();
                $dataT = [];
                foreach ($periods as $value) {
                    $period = period::find($value->Period_id);
                    $dataC = [
                        'Circulo' => $period->Name,
                    ];
                    array_push($dataT,$dataC);
                }
                $data = [
                    'Id' => $persona->id,
                    'Name' => $persona->Names,
                    'LastName' => $persona->LastNames,
                    'Phone' => $persona->Phone,
                    'User' => $usuario->name,
                    'Email' => $usuario->email,
                    'Conection' => "$usuario->email",
                    'Attendant' => $dataT,
                ];
                array_push($Models,$data);
                
            }
        }
            $type="Active";
           
        return view('Administration.Attendant.List',compact('buttons','Titles','Models','type'));
    }
    public function AttendantCreate(Request $request)
    {
        $buttons =[];
        $button = [
            "Name" => 'Listado de encargados de circulo',
            "Link" => 'administration/workspace/attendant/list',
            "Type" => "add"
        ];  
        array_push($buttons,$button);
        return view('Administration.Attendant.Create',compact('buttons'));
    }
    public function test($test)
    {
        return view('Administration.Tests.'.$test);
    }
    public function AttendantChange(Request $request,$id,$type)
    {
        if($type=="deleteattendant")
        {
            $attendant = person::find($id)->User();
            $attendant->State= "Delete";
            $attendant->save();
            $assigns = Assign_attendant_periods::where(['user_id'=>$attendant->id,'State'=>'Active'])->get();
            foreach ($assigns as $value) {
                $value->State= "Delete";
                $value->save();
            }
            return redirect()->route('AttendantList');
        }
        if($type=="active")
        {
            $attendant = person::find($id)->User();
            $attendant->State= "Active";
            $attendant->save();
            $assigns = Assign_attendant_periods::where(['user_id'=>$attendant->id,'State'=>'Delete'])->get();
            foreach ($assigns as $value) {
                $check = Assign_attendant_periods::where(['Period_id'=>$value->Period_id,'State'=>'Active'])->first();
                if($check==null)
                {
                    $value->State= "Active";
                    $value->save();
                }
                else
                {
                    $value->delete();
                }
            }
        }
        return redirect()->route('AttendantDeletes');
    }
    Public function AttendantSave(Request $request)
    {
        $id = user::find($request->session()->get('User_id')); 
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        $Apellidos= $data['Apellido'];
        $Telefono= $data['Telefono'];
        $Usuario= $data['Usuario'];
        $Email= $data['Email'];
        $Contraseña = $data['Contraseña'];
        $Periods = $data['Period'];
        $Periods = explode(";",$Periods);
        $masculino = $data['masculino'];
        if(empty($Periods[0])){
            return response()->json(["Error" => "La asignación de circulos de estudio no puede quedar vacia"]);
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
                $registered_user = User::where('name',$Usuario)->first();
                if ($registered_user!=null)
                {
                    return response()->json(['Error' => "El nombre de usuario que ingreso ya esta registrado!"], 500);
                }
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
                $usuario_rol->rol_id = 4;
                $usuario_rol->user_id = $user->id;
                $usuario_rol->State = "Active";
                $usuario_rol->save();
                #Tabla logs
                $log = new logs;
                $log->Table = "Attendant";
                $log->User_ID = $id->name;
                $log->Description = "Se registraron los nuevos datos del encargado de circulo: ".$Nombres." ".$Apellidos;
                $log->Type = "Create";
                $log->save();
                $log = new logs;
                $log->Table = "Attendant";
                $log->User_ID = $id->name;
                $log->Description = "Se creo un nuevo usuario con nombre: ".$user->name." y correo: ".$user->email." del encargado de circulo: ".$Nombres;
                $log->Type = "Create";
                $log->save();
                $log = new logs;
                $log->Table = "Attendant";
                $log->User_ID = $id->name;
                $log->Description = "Se asigno el rol encargado de circulo al usuario: ".$user->name;
                $log->Type = "Assign";
                $log->save();
                for ($i=0; $i < count($Periods) ; $i++) {
                    $verificar = Assign_attendant_periods::where([['Period_id',$Periods[$i]],['State','Active']])->first();
                    if (!isset($verificar)) {
                        $user_Attendant = new Assign_attendant_periods;
                        $period = course::find($Periods[$i]);
                        $grado = grade::find($period->Grade_id)->GradeName();
                        $user_Attendant->user_id = $user->id;
                        $user_Attendant->Period_id = $Periods[$i];
                        $user_Attendant->Year = date('YY');
                        $user_Attendant->State = "Active";
                        $user_Attendant->save();
                        #logs registro de asignación
                        $log = new logs;
                        $log->Table = "Attendant";
                        $log->User_ID = $id->name;
                        $log->Description = "Se asigno el usuario: ".$user->name.
                        " al circulo de estudio  ".$Periods[$i];
                        $log->Type = "Assign";
                        $log->save();
                        
                    }
                }
                DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(["Accion completada"]);
    }
    public function GradesPeriod(Request $request)
    {
        $data = $request->data[0];
        foreach ($data['Grades'] as $Grade) {
            $NewGrade = new Grade;
            $NewGrade->Name = $Grade;
            $NewGrade->Level_id =$data['Level'];
            $NewGrade->State = "Active";
            $NewGrade->save();
        }
        return response()->json(["Accion completada"]);
    }
    //Funciones de crear    
    public function Create_Menu()
    {
        return view('Administration.Menu.Crear_Menu');
    }
    
    public function Store_Menu(Request $request)
    {
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        //LOGICA
        $menus = new Menu;
        $menus->Name = $Nombres;
        $menus->save();
        $logs = new Log;
        $logs->Table = "Menus";
        $logs->User_Id = $request->session()->get('User_Id');
        $logs->Description = "Se guardo menu ID =".$menus->id." Nombre =".$menus->Name;
        $logs->save();
        return response()->json(["Accion completada"]);
    }

    public function Create_Rol()
    {
        return view('Administration.Rol.Crear_Rol');        
    }
    
    public function Store_Rol(Request $request)
    {
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        //LOGICA
        $rols = new Rol;
        $rols->Name = $Nombres;
        $rols->save();
        $logs = new Log;
        $logs->Table = "Menus";
        $logs->User_Id = $request->session()->get('User_Id');
        $logs->Description = "Se guardo rol ID = ".$rols->id." Nombre = ".$rols->Name;
        $logs->save();
        return response()->json(["Accion completada"]);
    }
    
    public function AttendantSavePeriods(Request $request)
    {

        $id = user::find($request->session()->get('User_id')); 
        $data = $request->data[0];
        $Period = $data['Period'];
        $code = $data['Code'];
        $Attendant = Person::find($code);
        $Period = explode(";",$Period);
        
        if (empty($Period[0])) {
            return response()->json(["Error"=>"La asignación no debe estar vacia"]);
        }
        //LOGICA
        try {
            
              DB::beginTransaction();
                $delete = Assign_attendant_periods::where([['user_id',$code],['State','Active']])->get()->except($Period);
                foreach ($delete as $value) {
                    $deleteassign = Assign_attendant_periods::find($value->id);
                    $deleteassign->State = "Deactivated";
                    $deleteassign->save();
                }
                for ($i=0; $i < count($Period) ; $i++) {
                    $verificar = Assign_attendant_periods::where([['Period_id',$Period[$i]],['State','Active']])->first();
  
                    if ($verificar==null)
                     {     
                        $period = period::find($Period[$i]);
                        $usuario_curso = new Assign_attendant_periods;
                        $usuario_curso->user_id = $Attendant->User()->id;
                        $usuario_curso->Period_id = $Period[$i];
                        $usuario_curso->State = "Active";
                        $usuario_curso->save();
                        #logs registro de asignación
                        $log = new logs;
                        $log->Table = "Attendant";
                        $log->User_ID = $id->name;
                        $log->Description = "Se asigno el circulo de estudio ".$period." al encargado ".$Attendant->Names;
                        $log->Type = "Assign";
                        $log->save();
                    }
                    else if (isset($delete)){

                    }
                }
                DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(["Accion completada"]);

    }

    public function Create_permission()
    {
        return view('Administration/Permisos/formulario');
    }
    public function LoadGrades(Request $request)
    {   
        $ModelsData = level::find($request['LvlId']);
        $Models =[];
        foreach ($ModelsData->Grades()  as $value) {
            $model = [
                "Id" =>$value->id,
                "Name" =>$value->Name." ".$value->Section,
            ];
            array_push($Models,$model);
         } 
        return response()->json([
            "Grades" => $Models,
            ]);
    }
    public function LoadLevels(Request $request)
    {   
        $ModelsData = period::find($request['PeriodId']);
        $Models =[];
        foreach ($ModelsData->Levels()  as $value) {
            $model = [
                "Id" =>$value->id,
                "Name" =>$value->Name,
            ];
            array_push($Models,$model);
         } 
        return response()->json([
            "Levels" => $Models,
            ]);
    }
  
    public function LoadPeriodsAttendant()
    {
        $PeriodsData = period::where('State','Active')->get();
        $periods =[];
       
        foreach ($PeriodsData as $value) {
            $assign=Assign_attendant_periods::where('Period_id',$value->id)->first();
            if($assign==null)
            {
                $period = [
                    "Id" =>$value->id,
                    "Name" =>$value->Name,
                ];
                array_push($periods,$period);
            }
         } 
        return response()->json([
            "Periods" => $periods,
            ]);
    }
    public function LoadPeriods()
    {
        $PeriodsData = period::where('State','Active')->get();
        $periods =[];
       
        foreach ($PeriodsData as $value) {
            $period = [
                "Id" =>$value->id,
                "Name" =>$value->Name,
            ];
            array_push($periods,$period);
         } 
        return response()->json([
            "Periods" => $periods,
            ]);
    }
    public function LoadCourses(Request $request)
    {
        $CoursesData = course::where(['Grade_id'=>$request['GradeId'],'State'=>"active"])->get();
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
    public function LevelList()
    {
        $buttons =[];
        $button = [
            "Name" => 'Añadir un circulo de estudio',
            "Link" => 'create()',
            "Type" => "addFunction"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver circulos de estudio eliminados',
            "Link" => 'administration/configurations/level/list/deletes',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $Titles =['Id','Circulo de estudio','Niveles','No de Grados','Acciones'];
        $Models = [];
        $model = period::where("State","Active")->get();
        foreach ($model as $value) {
            $levels = "";
            $idLvl = "";
            foreach ($value->Levels() as $key => $value2) {
                if($levels!="")
                $levels = $levels.", ".$value2->Name;
                else
                $levels =$value2->Name;
                if($idLvl!="")
                $idLvl = $idLvl.",".$value2->id;
                else
                $idLvl =$value2->id;
            }
            $m =[
                "Id" => $value->id,  
                "Jornada" => $value->Name,  
                "idLvl" =>$idLvl,
                "Niveles" => $levels,
                "Grados" =>$value->NoGrades()
            ];
            array_push($Models,$m);
        }
        $type="Active";
        return view('Administration.Grades.Level_List',compact('Titles','Models','buttons','type'));
    }
    public function ViewGradesLvl($id)
    {
        $buttons =[];
        $button = [
            "Name" => 'Añadir un grado',
            "Link" => 'create()',
            "Type" => "addFunction"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver grados eliminados',
            "Link" => 'administration/home/dashboard',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver cursos eliminados',
            "Link" => 'administration/configurations/level/list/deletes',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver log de grados y cursos',
            "Link" => 'administration/configurations/level/list/deletes',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $Titles =['Id','Grado','Nivel','Cursos','No. de Voluntarios','Acciones'];
        $lvl = level::find($id); 
        $level = $lvl->Name;
        $period = $lvl->Period()->Name;
        $Models = [];
        $type ="Active";
        foreach ($lvl->Grades() as $key => $value) {
            $m =[
                "Id" => $value->id,  
                "Grade" => $value->Name,  
                "Lvl" => $lvl->Name,
                "Curses" => $value->CoursesList(),
                "NoTeachers" => "0"
            ];
            array_push($Models,$m);
        }
        return view('Administration.Grades.List',compact('Titles','Models', 'level','period','buttons','type','id'));
    }
    public function GradeSave(Request $request)
    {
        $Grade = new grade;
        $data = $request->data[0];
        $Grade->Name = $data['Name'];
        $Grade->State = "Active";
        $Grade->Level_id =  $data['id'];
        $Grade->save();
        
        return response()->json(["Accion completada"]);
    }
    public function SaveCourses(Request $request)
    {
        $courses =$request->data;
        $grade =$request->Id;
        foreach($courses as $Course)
        {
            
            $course = new course;
            $course->Name =  $Course;
            $course->Grade_id =$grade;
            $course->State = "Active";
            $course->save();
        }
        
        return response()->json(["Accion completada"]);
    }
    public function LevelListDelete()
    {
        $buttons =[];

        $button = [
            "Name" => 'Ver grados de una jornada',
            "Link" => 'administration/home/dashboard',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver jornadas activas',
            "Link" => 'administration/configurations/level/list',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);

        $Titles =['Id','Dia','Niveles','No de Grados','Acciones'];
        $Models = [];
        $model = period::where("State","Delete")->get();
       
    
        foreach ($model as $value) {
            $levels = "";
            $idLvl = "";
            foreach ($value->Levels() as $key => $value2) {
                if($levels!="")
                $levels = $levels.", ".$value2->Name;
                else
                $levels =$value2->Name;
                if($idLvl!="")
                $idLvl = $idLvl.", ".$value2->id;
                else
                $idLvl =$value2->id;
            }
           
            $m =[
                "Id" => $value->id,  
                "Jornada" => $value->Name,  
                "idLvl" =>$idLvl,
                "Niveles" => $levels,
                "Grados" => count($value->Grades())
            ];
            array_push($Models,$m);
        }
        $type="Delete";
        return view('Administration.Grades.Level_List',compact('Titles','Models','buttons','type'));
    }
    public function addGrade(Request $request)
    {
        
        $Grade = new grade;
        $data = $request->data[0];
        $Grade->Name = $data['Name'];
        $Grade->State = "Active";
        $Grade->Level_id =  $data['id'];
        $Grade->save();
        return response()->json(["Accion completada"]);
    }
    public function GradeUpdate(Request $request)
    {
        $data = $request->data[0];
        $model = grade::find($data['Code']);
        $model->Name = $data['Name'];
        $model->State = "Active";
        $model->save();
        return response()->json(["Accion completada"]);
    }
    public function LevelSave(Request $request)
    {
        $level = new level;
        $data = $request->data[0];
        $level->Name = $data['Name'];
        $level->State = "Active";
        $level->Period_id =  $data['id'];
        $level->save();
        return response()->json(["Accion completada"]);
    }

    public function PeriodSave(Request $request)
    {
        $period = new period;
        $data = $request->data[0];
        $period->Name = $data['Name'];
        $period->State = "Active";
        $period->save();
        return response()->json(["Accion completada"]);
    }
    public function PeriodUpdate(Request $request)
    {
        $data = $request->data[0];
        $period = period::find($data['Code']);
        $period->Name = $data['Name'];
        $period->State = "Active";
        $period->save();
        return response()->json(["Accion completada"]);
    }
    public function ChangePeriod(Request $request,$id,$type)
    {
        if($type=="delete")
        {
            $period = period::find($id);
            $period->State= "Delete";
            $period->save();
        }
        if($type=="deletelevel")
        {
            $level = level::find($id);
            $level->State= "Delete";
            $level->save();
        }
        if($type=="deletecourse")
        {
            $course = course::find($id);
            $id= grade::find( $course->Grade_id)->Level()->id;
            $course->State= "Delete";
            $course->save();
            return redirect()->route('ViewGradesLvl',$id);
           
        }
        if($type=="deletegrade")
        {
            $grade = grade::find($id);
            $id= $grade->Level()->id;
            $grade->State= "Delete";
            $grade->save();
            return redirect()->route('ViewGradesLvl',$id);
           
        }
        if($type=="active")
        {
            $period = period::find($id);
            $period->State= "Active";
            $period->save();
        }
        return redirect()->route('LevelList');
    }
    public function Save_Permission(Request $request)
    {
        $data = $request->data[0];
        $Nombre= $data['Nombre'];
        $Slug= $data['Slug'];
        //LOGICA
        $permission = new permission;
        $permission->Name = $Nombre;
        $permission->Slug = $Slug;
        $permission->save();
        $permission->save();
        $logs = new Log;
        $logs->Table = "Permisos";
        $logs->User_Id = $request->session()->get('User_Id');
        $logs->Description = "Se guardo permiso ID = ".$permission->id." Nombre = ".$permission->Name;
        $logs->save();
        return response()->json(["Accion completada"]);
    }
    
    public function Create_schedule()
    {
        return view('Administration/Horarios/formulario');
    }
    
    public function Save_Schedule(Request $request)
    {
        $data = $request->data[0];
        $HI = $data['HoraInicio'];
        $HF = $data['HoraFinal'];
        $Dia = $data['Dia'];
        $Tipo = $data['Tipo'];
        $horario = new schedule;
        $horario->StartHour = $HI;
        $horario->EndHour = $HF;
        $horario->Day = $Dia;
        $horario->Type = $Tipo;
        $horario->save();
        $logs = new Log;
        $logs->Table = "Horarios";
        $logs->User_Id = $request->session()->get('User_Id');
        $logs->Description = "Se guardo horario ID = ".$horario->id." Dia = ".$horario->Day;
        $logs->save();
        return response()->json(["Accion completada"]);
    }
    
    public function Create_grade()
    {
    }
    public function Create_courses()
    {
    }

    

    public function View_Menu()
    {
        $menus = menu::all();
        return view('Administration.Menu.ListadoMenus',compact('menus'));
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
        $Titles =['Id','Nombre','Apellido','Grado','Acciones'];
        $Models = [];
        return view('Administration.Nivel.ListadoNiveles',compact('levels'));
    }
    
    public function View_Classroom()
    {
        $classrooms = classroom::all();
        return view('Administration.Clase.ListadoClases',compact('classrooms'));
    }
    
    public function View_Schedule()
    {
        $Titles = ['ID','Hora Inicio', 'Hora Final', 'Dia', 'Tipo'];
        $Models = schedule::all();
        return view('Administration/Horarios/Horarios',compact('Models','Titles'));
    }
    
    
    
    public function Edit_Permission($id)
    {
        $Model = permission::find($id);
        return view('Administration/Permisos/formEdit',compact('Model'));
    }
    
    public function Update_Permission($id, Request $request)
    {
        $data = $request->data[0];
        $Nombre= $data['Permiso'];
        $Slug= $data['Slug'];
        //LOGICA
        $dataP=array(
            'Name' => $Nombre,
            'Slug' => $Slug,
        );
        permission::where('id',$id)->update($dataP);
        return response()->json(["Accion completada"]);
    }
    
    public function Edit_Schedule($id)
    {
        $Model = schedule::find($id);
        return view('Administration/Horarios/formEdit',compact('Model'));
    }
    
    public function Update_Schedule($id, Request $request)
    {
        $data = $request->data[0];
        $HI = $data['HoraInicio'];
        $HF = $data['HoraFinal'];
        $Dia = $data['Dia'];
        $Tipo = $data['Tipo'];
        $dataH=array(
            'StartHour' => $HI,
            'EndHour' => $HF,
            'Day' => $Dia,
            'Type' => $Tipo,
        );
        schedule::where('id',$id)->update($dataH);
       
        return response()->json(["Accion completada"]);
    }
    
    public function Update_menu()
    {
    }
    
    public function Update_grade()
    {
    }

    public function Update_courses()
    {
    }
    public function Report()
    {
        $buttons =[];

        $button = [
            "Name" => 'Exportar datos para impresión',
            "Link" => 'imprimir()',
            "Type" => "addFunction1"
        ];
        array_push($buttons,$button);
        $Month = [];
        $logs = logs::whereMonth('created_at', '=', \Carbon\Carbon::now()->format('m'))->get();
        foreach ($logs as $value) {
            setlocale(LC_TIME, "spanish");
            $newDate = date("d-m-Y", strtotime($value->created_at));	
            $mes = strftime("%d de %B del %Y", strtotime($newDate));
            $title = "Nuevo ".$value->Table;
            $state = "Success";
            $type = "New";
            if($value->Type=="Login")
            {
                $title ="Inicio ".$value->Table;
                $state ="Success";
                $type = "Info";
            }
            if($value->Type=="Eliminar")
            {
                $title ="Elimino ".$value->Table;
                $state ="Delete";
                $type = "Delete";
                
            }
            $M = [
                "Type"=> $type,
                "Title"=>$title,
                "User" =>$value->User_Id,
                "Description" => $value->Description,
                "Date" => $mes." a las ".date("H:m A", strtotime($value->created_at)),
                "Url" => "administration/home/dashboard",
                "State" => $state
            ];
            array_push($Month,$M);
        }
        $Week = [];
        $logs = logs::all();
        foreach ($logs as $value) {
            setlocale(LC_TIME, "spanish");
            $newDate = date("d-m-Y", strtotime($value->created_at));	
            $mes = strftime("%d de %B del %Y", strtotime($newDate));
            $title = "Nuevo ".$value->Table;
            $state = "Success";
            $type = "New";
            if($value->Type=="Login")
            {
                $title ="Inicio ".$value->Table;
                $state ="Success";
                $type = "Info";
            }
            if($value->Type=="Eliminar")
            {
                $title ="Elimino ".$value->Table;
                $state ="Delete";
                $type = "Delete";
                
            }
            $M = [
                "Type"=> $type,
                "Title"=>$title,
                "User" =>$value->User_Id,
                "Description" => $value->Description,
                "Date" => $mes." a las ".date("H:m A", strtotime($value->created_at)),
                "Url" => "administration/home/dashboard",
                "State" => $state
            ];
            array_push($Week,$M);
        }
        $Days = [];
        $logs = logs::whereDay('created_at', '=', \Carbon\Carbon::now()->format('d-m'))->get();
        foreach ($logs as $value) {
            setlocale(LC_TIME, "spanish");
            $newDate = date("d-m-Y", strtotime($value->created_at));	
            $mes = strftime("%d de %B del %Y", strtotime($newDate));
            $title = "Nuevo ".$value->Table;
            $state = "Success";
            $type = "New";
            if($value->Type=="Login")
            {
                $title ="Inicio ".$value->Table;
                $state ="Success";
                $type = "Info";
            }
            if($value->Type=="Eliminar")
            {
                $title ="Elimino ".$value->Table;
                $state ="Delete";
                $type = "Delete";
                
            }
            if($value->Type=="Activar")
            {
                $title ="Activo ".$value->Table;
                $state ="Success";
                $type = "Edit";
                
            }
            $M = [
                "Type"=> $type,
                "Title"=>$title,
                "User" =>$value->User_Id,
                "Description" => $value->Description,
                "Date" => $mes." a las ".date("g:i A", strtotime($value->created_at)),
                "Url" => "administration/home/dashboard",
                "State" => $state
            ];
            array_push($Days,$M);
        }
        $Logs =[
            "Month" =>$Month,
            "Week" =>$Week,
            "Days" =>$Days,
            "Test" =>[],
            "Timeline"=>[],
        ];
        return view('Administration/Dashboard/Report',compact('Logs','buttons'));
    }
    public function Inscriptions()
    {
        $Titles =['Id','Nombres','Grado','Fecha de inscripción','Acciones'];
        $Models = [];
        $data = period::where('State','Active')->get();
        foreach($data as $value)
        {
            foreach($value->Grades()->where('State','Active') as $grade)
            {
                foreach($grade->Students()->where('State','Active') as $Student)
                {
                    $model = [
                        "Id" =>$value->id,
                        "Name" =>$Student->person()->Names." ".$Student->person()->LastNames,
                        "Grade" => $value->Name." - ".$grade->GradeName(),
                        "Date" => $Student->created_at->format('d/m/Y'),
                    ];
                    array_push($Models,$model);
                }
            }
            
        }
        return view('Administration/Workspace/Inscriptions',compact('Titles','Models'));
    }
    public function Configurations()
    {
        return view('Administration/Configurations/Configuration');
    }
    public function WorkspaceList()
    {
        return view('Administration/Workspace/List');
    }
    public function Statistics()
    {
        return view('Administration/Workspace/Statistics');
    }
    public function Reports(Request $request,$id,$type)
    {        
        $models=[];
        $Titles=[];
        $title1 = "";
        $d="";
        if($type=="listadovoluntarios")
        {
            $Titles=['No',
            'Nombres',
            'Télefono',
            'Usuario',
            'Correo electronico',
            'Cursos asignados',
            'Ultima conexión'];
            if($id==1)
            {
                $year = date("Y");
                $rols = Assign_user_rol::where('Rol_id',2)->where('State','Active')->get();
                $usuario_rol = Assign_user_rol::where([['Rol_id',3],['State','Active']])->get('user_id');
                foreach ($usuario_rol as $v) {
                    $usuario = User::find($v->user_id);
                    $persona = Person::find($usuario->Person_id);
                    // $curses = User::find($v->user_id)->CoursesTeacher();
                    $curses = Asign_teacher_course::where([['user_id',$v->user_id],['State','Active']])->get();
                    $dataT = [];
                    foreach ($curses as $value) {
                        $coursesvol = "<ol>";
                        foreach ($curses as $value) {
                            $curso = course::find($value->Course_id);
                            $coursesvol = $coursesvol."<li>".$curso->Name." - ".$curso->Grade()->GradeNamePeriod() ."</li>";
                        }
                        $coursesvol = $coursesvol."</ol>";
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
                        'Name' => $persona->Names." ".$persona->LastNames,
                        'Telefono' => $persona->Phone,
                        'Usuario' => $usuario->name,
                        'Correo' => $usuario->email,
                        'Curses' => $coursesvol,
                        'Conection' => $conection ?? 'El usuario no se ha conectado'
                    ];
                    array_push($models,$data);
                }
                $title1 = "Listado de voluntarios";
                $pdf = PDF::loadView('Administration.Reports.pdf', compact('Titles','models','title1'));
                return $pdf->download('ListadoVoluntarios-'.date("d-m-y-H-i-A").'.pdf');
            }
            
        }
        if($type=="listadoalumnos")
        {
            $Titles=['No',
            'Nombres',
            'Télefono',
            'Usuario',
            'Correo electronico',
            'Grado',
            'Ultima conexión'];
            if($id==1)
            {
                $year = date("Y");
                $rols = Assign_user_rol::where('Rol_id',2)->where('State','Active')->get();
                
                foreach ($rols as $rol)
                {
                    $user = User::find($rol->user_id);
                    $student = Person::find($user->Person_id);
                    $assigns = Assign_student_grade::where('User_id',$user->id)->where('Year',$year)->where('State','Active')->get('Grade_id');
                    foreach ($assigns as $assign)
                    {
                        $conection = logs::where(['Type'=>'Login','User_Id'=>$user->name])->orderby('created_at','DESC')->take(1)->first();
                        if($conection)
                        {
                            setlocale(LC_TIME, "spanish");
                            $newDate = date("d-m-Y", strtotime($conection->created_at));	
                            $mes = strftime("%d de %B del %Y", strtotime($newDate));
                            $conection= $mes." a las ".date("H:m A", strtotime($conection->created_at));
                        }
                        
                        $grade = Grade::find($assign->Grade_id);
                        $query = [
                            'id' => $student->id,
                            'name' => $student->Names." ".$student->LastNames,
                            'phone' => $student->Phone,
                            'user' => $user->name,
                            'email' => $user->email,
                            'grade' => $grade->GradeName(),
                            'conexion' => $conection ?? 'El usuario no se ha conectado'
                        ];
                        array_push($models,$query);
                    }
                }

                $title1 = "Listado de alumnos";
                $pdf = PDF::loadView('Administration.Reports.pdf', compact('Titles','models','title1'));
                return $pdf->download('ListadoAlumnos-'.date("d-m-y-H-i-A").'.pdf');
            }   
        }
        if($type=="generalreportpdf")
        {
            
            $Titles=['No',
            'Responsable',
            'Actividad',
            'Tipo',
            'Fecha y hora'];
            if($id==1)
            {
                $title1 = "Reporte general todos los registros";
                $logs = logs::all();
                foreach ($logs as $key => $value) {
                    setlocale(LC_TIME, "spanish");
                    $newDate = date("d-m-Y", strtotime($value->created_at));	
                    $mes = strftime("%d de %B del %Y", strtotime($newDate));
                    $title = "Nuevo ".$value->Table;
                    $M = [
                        "Id"=> ($key+1),
                        "User" =>$value->User_Id,
                        "Description" => $value->Description,
                        "Type"=> $title,
                        "Date" => $mes." a las ".date("g:i A", strtotime($value->created_at)),
                    ];
                    array_push($models,$M);
                }
                $d = "total";
            }
            if($id==2)
            {
                $title1 = "Reporte general mensual";
                $logs = logs::whereMonth('created_at', '=', \Carbon\Carbon::now()->format('m'))->get();
                foreach ($logs as $key => $value) {
                    setlocale(LC_TIME, "spanish");
                    $newDate = date("d-m-Y", strtotime($value->created_at));	
                    $mes = strftime("%d de %B del %Y", strtotime($newDate));
                    $title = "Nuevo ".$value->Table;
                    $M = [
                        "Id"=> ($key+1),
                        "User" =>$value->User_Id,
                        "Description" => $value->Description,
                        "Type"=> $title,
                        "Date" =>  $mes." a las ".date("g:i A", strtotime($value->created_at)),
                    ];
                    array_push($models,$M);
                }
                $d = "mensual";
            }
            if($id==3)
            {
                $title1 = "Reporte general del dia";
                $logs = logs::whereDay('created_at', '=', \Carbon\Carbon::now()->format('d-m'))->get();
                foreach ($logs as $key => $value ) {
                    setlocale(LC_TIME, "spanish");
                    $newDate = date("d-m-Y", strtotime($value->created_at));	
                    $mes = strftime("%d de %B del %Y", strtotime($newDate));
                    $title = "Nuevo ".$value->Table;
                    $M = [
                        "Id"=> ($key+1),
                        "User" =>$value->User_Id,
                        "Description" => $value->Description,
                        "Type"=> $title,
                        "Date" =>  $mes." a las ".date("g:i A", strtotime($value->created_at)),
                    ];
                    array_push($models,$M);
                }
                $d = "deldia";
            }
            $pdf = PDF::loadView('Administration.Reports.pdf', compact('Titles','models','title1'));
            return $pdf->download('ReporteGeneral-'.$d.'-'.date("d-m-y-H-i-A").'.pdf');
        }

        return false;
    }
}
