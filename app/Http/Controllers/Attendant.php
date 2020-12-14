<?php

namespace App\Http\Controllers;
use DateTime;
use DateTimeZone;
use Session;
use Illuminate\Http\Request;

use App\Models\Assign_attendant_periods;
//tabla de notas
use App\Models\Note;
//tabla asignacion actividad
use App\Models\Assign_activity;
//tabla de cursos
use App\Models\course;
//tabla de usuarios
use App\Models\User;
//tabla de Personas
use App\Models\Person;
use App\Models\grade;
use App\Models\Asign_teacher_course;
use App\Models\period;
#Tabla logs
use App\Models\logs;
use App\Models\Assign_student_grade;
use App\Models\Asign_test_course;
use App\Models\information;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class Attendant extends Controller
{
    public function AttendantHome(Request $request)
    {
        $Titles =[];
        $Models = [];
        $data = user::find($request->session()->get('User_id'));
        $DataAttendant=[];
        $DataPeriods=[];
        $nPending=0;
        $nAproved = 0;
        $Pending = [];
        $Aproved = [];
        $logs=[];
        if($data)
        {
            foreach ($data->PeriodsAttendantData() as $key => $period) {
                foreach ($period->Grades() as $grade) {
                   foreach($grade->Courses() as $course)
                   {
                       $notes = Note::where(['Course_id'=>$course->id,'State'=>"Qualified"])->first();
                       if($notes!=null)
                       {
                        $nPending++;
                        $Assign = Course::find($course->id);
                        setlocale(LC_TIME, 'es');
                        $tiempo = new Carbon($notes->updated_at);
                        $newDateFinal= $tiempo->formatLocalized('%d de %B de %Y')." ".date("H:i A",strtotime($notes->updated_at));
                        
                        $note = [
                            "id"=>$course->id,
                            "Course" => $Assign->Name." ".$Assign->Grade()->GradeNamePeriod(),
                            "Activity"=>$notes->Test()->Activity()->Name,
                            "Update"=>$newDateFinal,
                        ];
                        array_push($Pending,$note);
                       }
                       
                       $notes = Note::where(['Course_id'=>$course->id,'State'=>"Approved"])->first();
  
                       if($notes!=null)
                       {
                            $nAproved++;
                            $Assign = Course::find($course->id);
                            setlocale(LC_TIME, 'es');
                            $tiempo = new Carbon($notes->updated_at);
                            $newDateFinal= $tiempo->formatLocalized('%d de %B de %Y')." ".date("H:i A",strtotime($notes->updated_at));
                            
                            $note = [
                                "id"=>$notes->id,
                                "Course" => $Assign->Name." ".$Assign->Grade()->GradeNamePeriod(),
                                "Activity"=>$notes->Test()->Activity()->Name,
                                "Update"=>$newDateFinal,
                            ];
                            array_push($Aproved,$note);
                            
                       }
                      

                       $log = logs::where('Period_id',$period->id)->get();
                       foreach ($log as $value) {
                        if(!in_array($value,$logs))
                            array_push($logs,$value);
                       }
                       
                   }
                }
            }
        }
    
            $DataAttendant=[
                "CountPeriods" => count($data->PeriodsAttendantData()),
                "NotesPending" => $nPending,
                "NotesAproved" => $nAproved,
                "Pending" =>$Pending,
                "Aproved" =>$Aproved,
                "Logs" => $logs
            ];
      
        return view('Attendant/Home',compact('Titles','Models','DataAttendant'));
    }
    public function NotesAttendant(Request $request, $id)
    {
        $Models = [];
        $buttons =[];
        $Titles = [];
        $Modal = [];
 
            $course = course::find($id);
            $assignV = Asign_teacher_course::where('Course_id',$id)->first();
            if(isset($assignV)){
                $userV = user::find($assignV->user_id);
                $vol = $userV->person();
                $Nombre = $vol->Names.' '.$vol->LastNames;
            }else{
                $Nombre = "Voluntario no asignado";
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
                                    $nota =[
                                        "score"=>0,
                                        "State"=>""
                                    ];
                                    array_push($notas,$nota);
                                }
                                else if($note->State == "Qualified"){
                                    $nota =[
                                        "score"=>$note->Score,
                                        "State"=>"Qualified"
                                    ];
                                    array_push($notas, $nota);
                                }
                                else if($note->State == "Approved"){
                                    $nota =[
                                        "score"=>$note->Score,
                                        "State"=>"Approved"
                                    ];
                                    array_push($notas,$note->nota);
                                }
                                else{
                                    $nota =[
                                        "score"=>"El examen no se ha sido enviado a revisión",
                                        "State"=>""
                                    ];
                                    array_push($notas,$note->nota);
                                   
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
            "Name" => 'Aprobar notas',
            "Link" => '/attendant/send/state/'.$id.'/approve',
            "Type" => "btn2"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Reprobar notas',
            "Link" => '/attendant/send/state/'.$id.'/qualified',
            "Type" => "btn3"
        ];
        array_push($buttons,$button);
        $grado = grade::find($course->Grade_id)->GradeName();
        return view('Attendant/Notes',compact('buttons','Modal','Titles','Models','Nombre','course','grado'));
    }
    
    public function LoadPeriodsAttendantAsign(Request $request)
    {
        $id = user::find($request->session()->get('User_id')); 
        $periods =[];
       
        foreach ($id->PeriodsAttendantData() as $value) {
            $assign=Assign_attendant_periods::where('Period_id',$value->id)->first();
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

    public function ProfileAttendant(Request $request)
    {
        $Titles = ['Titulo','Contenido'];
        $user = User::find($request->session()->get('User_id')); 
        $person = Person::find($user->Person_id);
        $perids = Assign_attendant_periods::where([['user_id',$user->id],['State','Active'],['Year',date('Y')]])->get();
        $dataT = [];
        foreach ($perids as $value) {
            $period = period::find($value->Period_id);
            $dataC = [
                'Curso' => $period->Name,
            ];
            array_push($dataT,$dataC);
        }
        $info = [
            'titulo' => 'Circulos de estudio Asignados',
            'cursos' => $dataT,
        ];
        $data = [
            'Email' => $user->email,
            'Phone' => $person->Phone,
            'Name' => $person->Names,
            'LastNames' => $person->LastNames,
            'User' => $user->name,
            
        ];
        return view('Attendant/Profile',compact('info','data','Titles'));
    }
    public function UpdateProfileAttendant(Request $request)
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
    public function ActivitiesLogs(Request $request)
    {
        $models=[];
        $titles = [
            'No',
            'Responsable',
            'Actividad',
            'Tipo',
            'Fecha y hora'
        ];
        $id2 = User::find($request->session()->get('User_id'));
        $logs = logs::where(['User_Id'=>$id2->name])->get();
        foreach ($logs as $log)
        {
            setlocale(LC_TIME, "spanish");
            $newDate = date("d-m-Y", strtotime($log->created_at));	
            $mes = strftime("%d de %B del %Y", strtotime($newDate));
            $type = "";
            $color = "Success";
            if($log->Type=="Crear")
            {
                $type = "Nuevo registro";
                $color = "success";
            }
            if($log->Type=="Asignar")
            {
                $type = "Se asigno registro";
                $color = "warning";
            }
            if($log->Type=="Actualizar")
            {
                $type = "Se asigno registro";
                $color = "secundary";
            }
            if($log->Type=="Eliminar")
            {
                $type = "Se elimino registro";
                $color = "danger";
            }
            if($log->Type=="Login")
            {
                $type = "Ha iniciado sesión";
                $color = "primary";
            }
            if($log->Type=="Activar")
            {
                $type = "Se ha activado";
                $color = "primary";
            }
            $data = [
                'id' => $log->id,
                'responsible' => $log->User_Id,
                'activity' => $log->Description,
                'type' => $type,
                'color' => $color,
                'datatime' => $mes." a las ".date("g:i A", strtotime($log->created_at))
            ];
            array_push($models,$data);
        }
        return view('Attendant/Activity',compact('models','titles'));
    }

    public function __construct()
	{
		$this->middleware('auth');
	} 
    public function workspaceview(Request $request,$id)
    {
        $buttons =[];
        $button = [
            "Name" => 'Eliminar publicación',
            "Link" => 'administration/teacher/workspace/delete/'.$id,
            "Type" => "btndelete"
        ];
        array_push($buttons,$button);
        $info= information::find($id); 
        $course = course::find($info->To);
        setlocale(LC_TIME, "spanish");
        $newDate = date("d-m-Y", strtotime($info->created_at));	
        $mes = strftime("%d de %B del %Y", strtotime($newDate));
        $conection= $mes." a las ".date("H:m A", strtotime($info->created_at));
        if($course->Teacher())
        $teacher = $course->Teacher()->Person()->Names." ".$course->Teacher()->Person()->LastNames;
        else
        $teacher = "No asignado";
        $information=[
            "Course"=>$course->Name,
            "Title" =>$info->Title,
            "Description" =>$info->Message,
            "Date" => $conection,
            "Teacher"=>$teacher??'No asignado'
        ];
        if($request->session()->get('rol_Name')=="Voluntario")
        {
            return view('Teacher/ViewWorkspace',compact('information'));
        }
        $id=$info->To;
        return view('Attendant/ViewWorkspace',compact('buttons','information','id'));
    }
    public function workspacedelete($id)
    {
        $info= information::find($id); 
        $info->State="Delete";
        $info->save();
        $id=$info->To;
        Session::put([
            'message' => "¡Se ha eliminado con exito la publicación!",
             ]);
        return redirect()->route('WorkspaceTeacher',$id);
    }
    public function workspaceT(Request $request, $id)
    {
        $id2 = User::find($request->session()->get('User_id'));
        $course = course::find($id);
        $model = [];
        $grade = grade::find($course->Grade_id)->Period();
        $students = Assign_student_grade::where([['Grade_id',$course->Grade_id],['State','Active']])->get();
        $tests = Asign_test_course::where('Teacher_id',$id2->id)->get();
        $teacher = $id2->Person()->Names." ".$id2->Person()->Lastnames;
        $model = [
            "Course" => $course->Name,
            "Period" => $grade->Name,
            "Students" => count($students),
            "Teacher"=> $teacher ?? 'No asignado',
            "Test" => count($tests),
        ];
        $teacher = Person::find($id2->Person_id);
        $infos= information::where(['Type'=>'Course','To'=>$id,'State'=>'Active'])->get(); 
        $informations = [];
        foreach($infos as $info)
        {
            setlocale(LC_TIME, "spanish");
            $newDate = date("d-m-Y", strtotime($info->created_at));	
            $mes = strftime("%d de %B del %Y", strtotime($newDate));
            $conection= $mes." a las ".date("H:m A", strtotime($info->created_at));
            $information=[
                "id" =>$info->id,
                "Title" =>$info->Title,
                "Date" => $conection,
            ];
            array_push($informations,$information);
        }
        return view('/Attendant/WorkSpace',compact('model','teacher','id','informations'));
    }
    public function workspacesave(Request $request)
    {
        $data = $request['data'][0];
        $id = User::find($request->session()->get('User_id'));
        DB::beginTransaction();
        try {
            $course=course::find($request['ID']);
            $model = new information;
            $model->Title = $data['Titulo'];
            $model->Message = $data['Contenido'];
            $model->Type = "Course";
            $model->To = $request['ID'];
            $model->State = "Active";
            $model->save();
            $log = new logs;
            $log->Table = "Voluntario";
            $log->User_ID = $id->name;
            $log->Description = "Se ha asignado información ".$model->Title." para el curso ".$course->name." del grado ".$course->Grade()->GradeNamePeriod();
            $log->Type = "Create";
            $log->save();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return response()->json(["Error" => "No se ha guardado la publicación debe llenar todos los campos..."]);;
        }
        return response()->json(["Accion completada"]);
    }
    public function UpdateStateNotesAttendant(Request $request, $id,$type)
    {
        $curso = course::find($id);
        $nota = Note::where(['Course_id'=>$id])->get();
        if(count($nota)>0)
        {
            foreach ($nota as $n) {
                if($type=="qualified")
                {
                    $n->State = "Pre-Qualified";
                    $n->save();
                }
                if($type=="approve")
                {
                    $n->State = "Approved";
                    $n->save();
                }
            }
            if($type=="qualified")
                {
                    Session::put([
                        'message' => "Notas del curso ".$curso->Name." han sido devuletas para ser re-evaluadas, seran visibles editables por el voluntario encargado",
                        ]);
                }
            if($type=="approve")
                {
                    Session::put([
                        'message' => "Notas del curso ".$curso->Name." aprovadas, seran visibles para todos los alumnos",
                        ]);
                }
            return redirect('attendant/notes/view/'.$id);
        }
        else{
            return redirect('attendant/notes/view/'.$id)->withError("Las notas del curso ".$curso->Name." no han sido modificadas, no existen notas aun.");
            
        }
    }
    public function NotesAprovedAttendant(Request $request)
    {
        $Titles =['Id','Curso','Grado','Estado','Acciones'];
        $Models = [];
        $id = user::find($request->session()->get('User_id')); 
        $data = $id->PeriodsAttendantData();
        foreach($data as $value)
        {
            foreach($value->Grades()->where('State','Active') as $grade)
            {
                foreach($grade->Courses()->where('State','Active') as $Course)
                {
                    $nota = Note::where(['Course_id'=>$Course->id])->first();
                    $model = [
                        "Id" =>$Course->id,
                        "Course" =>$Course->Name,
                        "Grade" => $value->Name." - ".$grade->GradeName(),
                        "State" => $nota->State ?? "No asignada por el voluntario",
                    ];
                    array_push($Models,$model);
                }
            }
            
        }
        
        return view('Attendant/NotesStates',compact('Titles','Models'));
    }
}
