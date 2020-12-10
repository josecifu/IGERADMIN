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
#Tabla logs
use App\Models\logs;
use App\Models\Assign_student_grade;
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
    public function ProfileAttendant()
    {
        return view('Attendant/Profile');
    }
    public function UpdateStateNotesAttendant(Request $request, $id,$type)
    {
        $curso = course::find($id);
        $nota = Note::where(['Course_id'=>$id,'State'=>'Qualified'])->get();
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
