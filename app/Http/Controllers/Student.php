<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\logs;
use App\Models\rol;
use App\Models\Assign_user_rol;
use App\Models\User;
use App\Models\Person;
use App\Models\Assign_student_grade;
use App\Models\period;
use App\Models\grade;
use App\Models\level;
use App\Models\course;
use App\Models\Asign_answer_test_student;
use App\Models\Question;
use App\Models\test;
use App\Models\Note;
use App\Models\Assign_activity;
use App\Models\Asign_teacher_course;
//tabla de informacion
use App\Models\information;
use DateTime;

class Student extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
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
        return view('Student/Activity',compact('models','titles'));
    }
    public function Profile(Request $request)
    {
        $Titles = ['Titulo','Contenido'];
        $user = User::find($request->session()->get('User_id')); 
        $person = Person::find($user->Person_id);
        $grade =  $user->Asssign_Grade()->where('Year',date('Y'))->first();
        $dataT = [];
       
        $info = [
            'titulo' => 'Grado Asignado',
            'grado' => $grade->Grade()->GradeNamePeriod(),
        ];
        $data = [
            'Email' => $user->email,
            'Phone' => $person->Phone,
            'Name' => $person->Names,
            'LastNames' => $person->LastNames,
            'User' => $user->name,
            
        ];
        return view('Student/Profile',compact('info','data','Titles'));
    }
    public function update_profile(Request $request)
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
    public function statistics()
    {
        $models = [];
        $periods = period::where('State','Active')->get();
        $countsfemale = [];
        $countsmale = [];
        $periodsdata = [];
        $averagenotes = [];
        foreach($periods as $value)
        {
            $female = 0;
            $male = 0;
            $note = 0;
            $cantNotes = 0;
            foreach($value->Grades() as $grade)
            {
                foreach($grade->Courses() as $course)
                {
                    $notes = Note::where(['Course_id'=>$course->id,'State'=>'Approved'])->get();
                    foreach($notes as $n)
                    {
                        $note = $note +$n->Score;
                        $cantNotes++;
                    }
                }
                foreach($grade->Students() as $student)
                {
                    if($student->Person()->Gender=="Masculino")
                    {
                        $male++;
                    }
                    else
                    {
                        $female++;
                    }
                }
            }
            if($cantNotes!=0)
            $note=($note/$cantNotes);
            array_push($countsfemale,$female);
            array_push($countsmale,$male);
            array_push($periodsdata,$value->Name);
            array_push($averagenotes,$note);
        }
        
        return view('Administration/Student/statistics ',compact('countsfemale','countsmale','periodsdata','averagenotes'));
    }

    #FUNCIONES DE ESTUDIANTE
    public function workSpace(Request $request)
    {
        $id2 = User::find($request->session()->get('User_id'));
        $courses = $id2->Asssign_Grade()->Grade()->Courses();
        $informations = [];
        foreach($courses as $course)
        {
            $infos= information::where(['Type'=>'Course','To'=>$course->id])->get(); 
            foreach($infos as $info)
            {
                setlocale(LC_TIME, "spanish");
                $newDate = date("d-m-Y", strtotime($info->created_at));	
                $mes = strftime("%d de %B del %Y", strtotime($newDate));
                $conection= $mes." a las ".date("H:m A", strtotime($info->created_at));
                $information=[
                    "id"=>$info->id,
                    "Course"=>$course->Name,
                    "Title" =>$info->Title,
                    "Date" => $conection,
                ];
                array_push($informations,$information);
            }
        }
        return view('Student/workspace',compact('informations'));
    }
    public function workspaceview(Request $request,$id)
    {
        $info= information::find($id); 
        $course = course::find($info->To);
        setlocale(LC_TIME, "spanish");
        $newDate = date("d-m-Y", strtotime($info->created_at));	
        $mes = strftime("%d de %B del %Y", strtotime($newDate));
        $conection= $mes." a las ".date("H:m A", strtotime($info->created_at));
        $teacher = $course->Teacher()->Person()->Names." ".$course->Teacher()->Person()->LastNames;
        $information=[
            "Course"=>$course->Name,
            "Title" =>$info->Title,
            "Description" =>$info->Message,
            "Date" => $conection,
            "Teacher"=>$teacher??'No asignado'
        ];
        
        return view('Student/ViewWorkspace',compact('information'));
    }
    public function dashboard(Request $request)
    {
        $id = $request->session()->get('User_id');
        $year = date("Y");
        $models = [];
        $assign = Assign_student_grade::where(['user_id'=>$id,'Year'=>$year,'State'=>'Active'])->first();
        $courses = $assign->Grade()->Courses();
        foreach($courses as $course)
        { 
            if($course->Tests())
            {
                foreach($course->Tests()->where('Year',$year) as $test)
                {
                    $question = Question::where('Test_id',$test->id)->first();
                    if($question != null)
                    {
                        $answer = Asign_answer_test_student::where(['Question_id'=>$question->id,'Studen_id'=>$assign->id])->first();
                        if ($answer == null)
                        {
                            $dateStrStart =str_replace("/","-",$test->StartDate);
                            $StartDate = date("d-m-Y",strtotime($dateStrStart." - 5 days")); 
                            $StartDate2 = date("d-m-Y H:i:00",strtotime($dateStrStart)); 
                            $date_now = strtotime(date("d-m-Y H:i:00"));
                            $date_teststart = strtotime($StartDate);
                            $date_teststart2 = strtotime($StartDate2);
                            $dateStr =str_replace("/","-",$test->EndDate);
                            $EndDate =date('d-m-Y H:i:00', strtotime($dateStr));
                            $date_testend = strtotime($EndDate);
                            $start = true;
                            if($date_now >= $date_teststart)
                            {
                                if($date_now >= $date_teststart2)
                                {
                                    $start = false;
                                }
                                if($date_now <= $date_testend)
                                {
                                    if($test->StartDate)
                                    {
                                        $query =[
                                            'id' => $test->id,
                                            'course' => $course->Name,
                                            'test' => $test->Title,
                                            'start' => $test->StartDate,
                                            'end' => $test->EndDate
                                        ];
                                        array_push($models,$query);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return view('Student/home',compact('models'));
    }

    public function assists($id)
    {
        $buttons = [];
        $button = [
            "Name" => 'Añadir nuevo estudiante',
            "Link" => 'administration/student/create',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Listado de estudiantes activos',
            "Link" => 'administration/student/list',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Listado de estudiantes eliminados',
            "Link" => 'administration/student/list/eliminated',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Historial de registros',
            "Link" => 'administration/student/logs',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $models = [];
        $titles = [
            'No',
            'Fecha y hora',
        ];
        $student = Person::find($id);
        $user = $student->User();
        $logs = logs::where(['User_Id'=>$user->name,'Type'=>'Login'])->orderby('created_at','DESC')->get();
        $grade = grade::find($user->Asssign_Grade()->Grade_id)->GradeNamePeriod();
        foreach($logs as $log)
        {
            setlocale(LC_TIME, "spanish");
            $newDate = date("d-m-Y", strtotime($log->created_at));	
            $mes = strftime("%d de %B del %Y", strtotime($newDate));
            $conection= $mes." a las ".date("H:m A", strtotime($log->created_at));
            $l=[
                "Date"=>$conection
            ];
            array_push($models,$l);
        }
        return view('Administration/Student/assists',compact('models','titles','buttons','student','grade'));
    }



                                                    //FUNCIONES TERMINADAS
/*---------------------------------------------------------------------------------------------------------------------------*/

    public function test_questions(Request $request,$id)
    {
        $models = [];
        $titles = [];
        $test = test::find($id);
        $course = $test->Course()->Name;
        return view('Student/test_form',compact('titles','test','course'));
    }

    public function student_test_list(Request $request)
    {
        $id = $request->session()->get('User_id');
        $year = date("Y");
        $models = [];
        $assign = Assign_student_grade::where(['user_id'=>$id,'Year'=>$year,'State'=>'Active'])->first();
        $courses = $assign->Grade()->Courses();
        foreach($courses as $course)
        {
            if($course->Tests())
            {
                foreach($course->Tests()->where('Year',$year) as $test)
                {
                    $question = Question::where('Test_id',$test->id)->first();
                    if($question != null)
                    {
                        $answer = Asign_answer_test_student::where(['Question_id'=>$question->id,'Studen_id'=>$assign->id])->first();
                        if ($answer == null)
                        {
                            $dateStrStart =str_replace("/","-",$test->StartDate);
                            $StartDate = date("d-m-Y",strtotime($dateStrStart." - 5 days")); 
                            $StartDate2 = date("d-m-Y H:i:00",strtotime($dateStrStart)); 
                            $date_now = strtotime(date("d-m-Y H:i:00"));
                            $date_teststart = strtotime($StartDate);
                            $date_teststart2 = strtotime($StartDate2);
                            $dateStr =str_replace("/","-",$test->EndDate);
                            $EndDate =date('d-m-Y H:i:00', strtotime($dateStr));
                            $date_testend = strtotime($EndDate);
                            $start = true;
                            if($date_now >= $date_teststart)
                            {
                                if($date_now >= $date_teststart2)
                                {
                                    $start = false;
                                }
                                if($date_now <= $date_testend)
                                {
                                    if($test->StartDate)
                                    {
                                        $query = [
                                            'id' => $test->id,
                                            'course' => $course->Name,
                                            'test' => $test->Title,
                                            'start' => $test->StartDate,
                                            'end' => $test->EndDate,
                                            'score' => $test->Score,
                                            'NoQuestions' => $test->NoQuestions(),
                                            'activity' => $test->Activity()->Name,
                                            'Active' => $start,
                                            'teacher' => $course->Teacher()->Person()->Names." ".$course->Teacher()->Person()->LastNames
                                        ];
                                        array_push($models,$query);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return view('Student/test_list',compact('models'));
    }

    public function save_answer(Request $request)
    {
        $id = $request->session()->get('User_id');
        $year = date("Y");
        try
        {
            DB::beginTransaction();
            $totalScore=0;
            $test="";
            $assign = Assign_student_grade::where(['user_id'=>$id,'Year'=>$year,'State'=>'Active'])->first();
            foreach($request->data as $Answer)
            {
                $question = Question::find($Answer['QuestionId']);
                $score = 0;
                if(($Answer['Answer'] == $question->CorrectAnswers) && ($Answer['Answer'] != null))
                {
                    $score = $question->Score;
                }
                $totalScore=$totalScore+$score;
                $reply = new Asign_answer_test_student;
                $reply->Studen_id = $assign->id;
                $reply->Question_id = $Answer['QuestionId'];
                $reply->Score = $score;
                $reply->Answers = $Answer['Answer'];
                $reply->State = "Complete";
                $reply->save();
                $test = $question->Test();
            }
            $note = new Note;
            $note->Student_id = $assign->id;
            $note->Test_id = $test->id;
            $note->Score = $totalScore;
            $note->Course_id = $test->Course()->id;
            $note->State = "Complete";
            $note->Year = $year;
            $note->save();
            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
        }
        return response()->json(["Accion exitosa"]);
    }

    public function all_tests(Request $request)
    {
        $id = $request->session()->get('User_id');
        $year = date("Y");
        $models = [];
        $assign = Assign_student_grade::where(['user_id'=>$id,'Year'=>$year,'State'=>'Active'])->first();
        $courses = $assign->Grade()->Courses();
        foreach($courses as $course)
        {
            if($course->Tests())
            {
                foreach($course->Tests()->where('Year',$year) as $test)
                {
                    $state = [];
                    $question = Question::where('Test_id',$test->id)->first();
                    $check = Note::where(['Test_id'=>$test->id,'Student_id'=>$assign->id,'State'=>'Approved','Year'=>$year])->first();
                    if(($question == null) && ($check != null))
                    {
                        $state = "written";
                    }
                    else
                    {
                        $state = "none";
                    }
                    if($question != null)
                    {
                        $answer = Asign_answer_test_student::where(['Question_id'=>$question->id,'Studen_id'=>$assign->id])->first();
                        if ($answer == null)
                        {
                            $state = "start";
                        }
                        $option = Asign_answer_test_student::where(['Question_id'=>$question->id,'Studen_id'=>$assign->id,'State'=>'Qualified'])->first();
                        if (($answer != null) && ($option == null))
                        {
                            $state = "qualify";
                        }
                        if(($option != null) && ($check != null))
                        {
                            $state = "approved";
                        }
                    }
                    $dateStrStart = str_replace("/","-",$test->StartDate);
                    $StartDate = date("d-m-Y",strtotime($dateStrStart." - 5 days")); 
                    $StartDate2 = date("d-m-Y H:i:00",strtotime($dateStrStart)); 
                    $date_now = strtotime(date("d-m-Y H:i:00"));
                    $date_teststart = strtotime($StartDate);
                    $date_teststart2 = strtotime($StartDate2);
                    $dateStr = str_replace("/","-",$test->EndDate);
                    $EndDate = date('d-m-Y H:i:00', strtotime($dateStr));
                    $date_testend = strtotime($EndDate);
                    $start = "false";
                    $availability = "disabled";
                    if($date_now >= $date_teststart)
                    {
                        if($date_now >= $date_teststart2)
                        {
                            $start = "true";
                        }
                        if($date_now <= $date_testend)
                        {
                            if(($test->StartDate) && ($state != "qualify"))
                            {
                                $availability = "enabled";
                            }
                        }
                    }
                    $notes = Note::where(['Test_id'=>$test->id,'Student_id'=>$assign->id,'State'=>'Approved','Year'=>$year])->get('Score');
                    $query =[
                        'id' => $test->id,
                        'test' => $test->Title,
                        'score' => $test->Score,
                        'start' => $test->StartDate,
                        'end' => $test->EndDate,
                        'course' => $course->Name,
                        'NoQuestions' => $test->NoQuestions(),
                        'activity' => $test->Activity()->Name,
                        'teacher' => $course->Teacher()->Person()->Names." ".$course->Teacher()->Person()->LastNames,
                        'date' => date("m/d/Y",strtotime($test->StartDate)),
                        'notes' => $notes ?? 'Sin nota',
                        'hundred' => '100',
                        'activation' => $start,
                        'state' => $state,
                        'availability' => $availability,
                    ];
                    array_push($models,$query);
                }
            }
        }
        return view('Student/tests',compact('models','assign'));
    }

    public function test_review($id,$assign)
    {
        $year = date("Y");
        $models = [];
        $scores = [];
        $titles = [
            'Preguntas',
            'Mis Respuestas',
            'Puntajes Obtenido'
        ];
        $assign_student = Assign_student_grade::find($assign);
        $user_student = User::find($assign_student->user_id);
        $test = test::find($id);
        $activity = Assign_activity::find($test->Activity_id);
        $course = course::find($activity->Course_id);
        $assign_teacher = Asign_teacher_course::where(['Course_id'=>$course->id,'Year'=>$year,'State'=>'Active'])->first();
        $user_student = User::find($assign_teacher->user_id);
        $teacher = Person::find($user_student->Person_id);
        $questions = $test->Questions();
        $notes = Note::where(['Test_id'=>$test->id,'Student_id'=>$assign_student->id,'State'=>'Approved','Year'=>$year])->get();
        foreach ($notes as $note)
        {
            $consult = [
                'final' => $note->Score,
                'percentage' => (100/($test->Score))*($note->Score)
            ];
            array_push($scores,$consult);
        }
        foreach($questions as $question)
        {
            $answer = Asign_answer_test_student::where(['Studen_id'=>$assign,'Question_id'=>$question->id,'State'=>'Qualified'])->first();
            $query = [
                "id" => $question->id,
                "question" => $question->Title,
                "answer" => $answer->Answers ?? 'No contestada',
                "score" => $answer->Score ?? '0',
            ];
            array_push($models,$query);
        }
        return view('Student/test_review',compact('models','titles','test','course','teacher','scores'));
    }

    public function teacher_information(Request $request)
    {
        $id = $request->session()->get('User_id');
        $year = date("Y");
        $models = [];
        $assign = Assign_student_grade::where(['user_id'=>$id,'Year'=>$year,'State'=>'Active'])->first();
        $courses = $assign->Grade()->Courses();
        foreach($courses as $course)
        {
            $assign_teacher = Asign_teacher_course::where(['Course_id'=>$course->id,'Year'=>$year,'State'=>'Active'])->get('user_id');
            $user = User::find($assign_teacher)->first();
            if ($user==null)
            {
                $query =[
                    'course' => $course->Name,
                    'teacher' => 'Ningun voluntario asignado',
                    'phone' => 'Ninguno',
                    'gender' => 'Ninguno',
                    'email' => 'Ninguno'
                ];
                array_push($models,$query);
            }
            else
            {
                $teacher = Person::find($user->Person_id);
                $query =[
                    'course' => $course->Name,
                    'teacher' => $teacher->Names." ".$teacher->LastNames,
                    'phone' => $teacher->Phone,
                    'gender' => $teacher->Gender,
                    'email' => $user->email
                ];
                array_push($models,$query);
            }
        }
        return view('Student/teacher_information',compact('models'));
    }

    public function score_list(Request $request)
    {
        $id = $request->session()->get('User_id');
        $year = date("Y");
        $models = [];
        $titles = [];
        $assign = Assign_student_grade::where(['user_id'=>$id,'Year'=>$year,'State'=>'Active'])->first();
        $grade = Assign_student_grade::find($assign->id)->Grade();
        $courses = $grade->Courses();
        $data = [];
        foreach ($courses as $course)
        {
            $activities = Assign_activity::where([['Course_id',$course->id],['State','Active']])->get();
            foreach($activities as $activity)
            {
                if(!in_array($activity->Name,$data))
                {
                    array_push($data,$activity->Name);
                }
            }
        }
        $notesStuden =[];
        foreach ($data as $period)
        {
            $testData = [];
            foreach ($courses as $key=> $course)
            {
                $asignactivity = Assign_activity::where(['Name'=>$period,'Course_id'=>$course->id])->first();
                $tests = test::where('Activity_id',$asignactivity->id)->get();
                if(count($tests)>0)
                {
                    foreach ($tests as $test)
                    {
                        if(!in_array($test->Title,$testData))
                        {
                            array_push($testData,$test->Title);
                        }
                    }
                }
            }
            if(count($testData)<=0)
            {
                $testData = ["Sin examenes"];
            }
            $title=[
                "Activity" => $period,
                "No" => count($testData),
                "Test"=>$testData
            ];
            array_push($titles,$title);
        }
        foreach ($titles as $value)
        {
            foreach ($value['Test'] as $test)
            {
                foreach ($courses as $key=> $course)
                {
                    $notes =[]; 
                    $id = $request->session()->get('User_id');
                    $year = date('Y');
                    $assign = Assign_student_grade::where(['user_id'=>$id,'Year'=>$year])->first();
                    $asignactivity = Assign_activity::where(['Name'=>$value['Activity'],'Course_id'=>$course->id])->first();
                    $testInfo = test::where(['Activity_id'=>$asignactivity->id,'Title'=> $test])->first();
                    if($testInfo!=null)
                    {
                        $note = Note::where(['Test_id'=>$testInfo->id,'Course_id'=>$course->id,"Student_id"=>$assign->id,"State"=>"Approved"])->first();
                        if($note!=null)
                        {
                            $n = [
                                "Note"=>$note->Score,
                                "Max"=>$testInfo->Score,
                                "Porcentage"=> ((100*intval($note->Score))/intval($testInfo->Score)),
                            ];
                            array_push($notes,$n);
                        }
                        else
                        {
                            array_push($notes,"No disponible");
                        }
                    }
                    else
                    {
                        array_push($notes,"N");
                    }
                    if(!isset($notesStuden[$key]))
                    {
                        $notesStuden[$key]=[];
                    }
                    array_push($notesStuden[$key],$notes);
                }
            }
        }
        foreach ($courses as $key=> $course)
        {
            $model = [
                "id" => $course->id,
                "Course"=>$course->Name,
                "Notes" =>$notesStuden[$key]
            ];
            array_push($models,$model);
        }
        return view('Student/score_list',compact('models','titles'));
    }

    #FUNCIONES DE ADMINISTRACION
    public function list()
    {
        $buttons = [];
        $button = [
            "Name" => 'Añadir nuevo estudiante',
            "Link" => 'administration/student/create',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Listado de estudiantes eliminados',
            "Link" => 'administration/student/list/eliminated',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Historial de estudiantes',
            "Link" => 'administration/student/logs',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);        
        $models = [];
        $titles = [
            'No',
            'Nombres',
            'Apellidos',
            'Teléfono',
            'Usuario',
            'Correo electrónico',
            'Grado',
            'Última conexión',
            'Acciones'
        ];
        $year = date("Y");
        $rols = Assign_user_rol::where(['Rol_id'=>2,'State'=>'Active'])->get();
        foreach ($rols as $rol)
        {
            $user = User::find($rol->user_id);
            $student = Person::find($user->Person_id);
            $assigns = Assign_student_grade::where(['User_id'=>$user->id,'Year'=>$year,'State'=>'Active'])->get('Grade_id');
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
                $grade = grade::find($assign->Grade_id);
                $query = [
                    'id' => $student->id,
                    'name' => $student->Names,
                    'lastname' => $student->LastNames,
                    'phone' => $student->Phone,
                    'user' => $user->name,
                    'email' => $user->email,
                    'grade' => $grade->GradeNamePeriod(),
                    'conexion' => $conection ?? 'El usuario no se ha conectado'
                ];
                array_push($models,$query);
            }
        }
        return view('Administration/Student/list',compact('models','titles','buttons'));
    }

    public function list_bygrade($id)
    {
        $buttons = [];
        $button = [
            "Name" => 'Añadir nuevo estudiante',
            "Link" => 'administration/student/create',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Listado de estudiantes eliminados',
            "Link" => 'administration/student/list/eliminated',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Historial de registros',
            "Link" => 'administration/student/logs',
            "Type" => "btn1"
        ];
        array_push($buttons,$button); 
        $models = [];
        $titles = [
            'No',
            'Nombres',
            'Apellidos',
            'Teléfono',
            'Usuario',
            'Correo electrónico',
            'Última conexión',
            'Acciones'
        ];
        $grade = grade::find($id);
        $year = date("Y");
        $rols = Assign_user_rol::where(['Rol_id'=>2,'State'=>'Active'])->get();
        foreach ($rols as $rol)
        {
            $user = User::find($rol->user_id);
            $student = Person::find($user->Person_id);
            $assigns = Assign_student_grade::where(['User_id'=>$user->id,'Year'=>$year,'State'=>'Active','Grade_id'=>$grade->id])->get('Grade_id');
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
                $query = [
                    'id' => $student->id,
                    'name' => $student->Names,
                    'lastname' => $student->LastNames,
                    'phone' => $student->Phone,
                    'user' => $user->name,
                    'email' => $user->email,
                    'conexion' => $conection ?? 'El usuario no se ha conectado'
                ];
                array_push($models,$query);
            }
        }
        $studentgrade = $grade->GradeNamePeriod();
        return view('Administration/Student/list_bygrade',compact('models','titles','buttons','studentgrade','id'));
    }

    public function eliminated_students()
    {
        $buttons = [];
        $button = [
            "Name" => 'Añadir nuevo estudiante',
            "Link" => 'administration/student/create',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Listado de estudiantes activos',
            "Link" => 'administration/student/list',
            "Type" => "btn1"
        ];
        array_push($buttons,$button); 
        $button = [
            "Name" => 'Historial de registros',
            "Link" => 'administration/student/logs',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $models = [];
        $titles = [
            'No',
            'Nombres',
            'Apellidos',
            'Teléfono',
            'Usuario',
            'Correo electrónico',
            'Última conexión',
            'Acciones'
        ];
        $rols = Assign_user_rol::where(['Rol_id'=>2,'State'=>'Desactivated'])->get('user_id');
        foreach ($rols as $rol)
        {
            $user = User::find($rol->user_id);
            $student = Person::find($user->Person_id);
            $conection = logs::where(['Type'=>'Login','User_Id'=>$user->name])->orderby('created_at','DESC')->take(1)->first();
            if($conection)
            {
                setlocale(LC_TIME, "spanish");
                $newDate = date("d-m-Y", strtotime($conection->created_at));	
                $mes = strftime("%d de %B del %Y", strtotime($newDate));
                $conection= $mes." a las ".date("H:m A", strtotime($conection->created_at));
            }
            $query = [
                'id' => $student->id,
                'name' => $student->Names,
                'lastname' => $student->LastNames,
                'phone' => $student->Phone,
                'user' => $user->name,
                'email' => $user->email,
                'conexion' => $conection ?? 'El usuario no se ha conectado'
            ];
            array_push($models,$query);
        }
        return view('Administration/Student/eliminated_students',compact('models','titles','buttons'));
    }

    public function logs()
    {
        $buttons = [];
        $button = [
            "Name" => 'Añadir nuevo estudiante',
            "Link" => 'administration/student/create',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Listado de estudiantes activos',
            "Link" => 'administration/student/list',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Listado de estudiantes eliminados',
            "Link" => 'administration/student/list/eliminated',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $models = [];
        $titles = [
            'No',
            'Responsable',
            'Actividad',
            'Tipo',
            'Fecha y hora'
        ];
        $logs = logs::whereIn('Table',['Estudiante','Usuario','Rol','Grado'])->get();
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
        return view('Administration/Student/logs',compact('models','titles','buttons'));
    }

    //ASSISTS

    public function create()
    {
        return view('Administration/Student/create_form');
    }

    public function save(Request $request)
    {
        $code = $request->session()->get('User_id');
        $responsible_user = User::find($code);
        $data = $request->data[0];
        $names = $data['Nombre'];
        $lastnames = $data['Apellido'];
        $phone = $data['Telefono'];
        $gender = $data['Genero'];
        $username = $data['Usuario'];
        $email = $data['Correo'];
        $password = $data['Contraseña'];
        $year = date("Y");
        $grade = grade::find($data['Grado']);
        $registered_user = User::where('name',$username)->first();
        try
        {
            DB::beginTransaction();
            $student = new Person;
            $student->Names = $names;
            $student->LastNames = $lastnames;
            $student->Phone = $phone;
            if ($gender == "true")
            {
                $student->Gender = 'Masculino';
            }
            else
            {
                $student->Gender = 'Femenino';
            }
            $student->save();
            $user = new User;
            if ($registered_user!=null)
            {
                return response()->json(['Error' => "El nombre de usuario que ingreso ya esta registrado!"], 500);
            }
            $user->name = $username;
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->State = "Active";
            $user->Person_id = $student->id;
            $user->save();
            $user_rol = new Assign_user_rol;
            $user_rol->rol_id = 2;
            $user_rol->user_id = $user->id;
            $user_rol->State = "Active";
            $user_rol->save();
            $student_grades = new Assign_student_grade;
            $student_grades->user_id = $user->id;
            if ($grade == null)
            {
                return response()->json(['Error' => "Debe seleccionar el grado en el cual será inscrito el estudiante!"], 500);
            }
            $student_grades->Grade_id = $grade->id;
            $student_grades->Year = $year;
            $student_grades->State ="Active";
            $student_grades->save();
            $log = new logs;
            $log->Table = "Estudiante";
            $log->User_ID = $responsible_user->name;
            $log->Description = "Se registro un nuevo estudiante ".$student->Names." ".$student->LastNames;
            $log->Type = "Crear";
            $log->save();
            $log = new logs;
            $log->Table = "Usuario";
            $log->User_ID = $responsible_user->name;
            $log->Description = "Se registro un nuevo usuario ".$user->name;
            $log->Type = "Crear";
            $log->save();
            $log = new logs;
            $log->Table = "Rol";
            $log->User_ID = $responsible_user->name;
            $log->Description = "Se ha asignado el rol Estudiante al usuario ".$user->name;
            $log->Type = "Asignar";
            $log->save();
            $log = new logs;
            $log->Table = "Grado";
            $log->User_ID = $responsible_user->name;
            $log->Description = "El estudiante ".$student->Names." ".$student->LastNames." ha sido asignado al grado ".$grade->GradeName();
            $log->Type = "Asignar";
            $log->Period_id = $grade->Period()->id;
            $log->save();
            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
        }
        return response()->json(["Accion exitosa"]);
    }

    public function edit($id)
    {
        $student = Person::find($id);
        $user = User::where('Person_id',$id)->first();
        $models = [
            'Usuario' => $user->name,
            'Email' => $user->email
        ];
        return view('Administration/Student/edit_form',compact('student','models'));
    }

    public function update(Request $request)
    {
        $values = '';
        $code = $request->session()->get('User_id');
        $responsible_user = User::find($code);
        $data = $request->data[0];
        $names = $data['Nombre'];
        $lastnames = $data['Apellido'];
        $phone = $data['Telefono'];
        $gender = $data['Genero'];
        if ($gender == "true")
        {
            $values = 'Masculino';
        }
        else
        {
            $values = 'Femenino';
        }
        $username = $data['Usuario'];
        $email = $data['Email'];
        $student = Person::find($data['Persona']);
        $registered_user = User::where('name',$username)->first();
        $data_user = array(
            'name' => $username,
            'email' => $email
        );
        User::where('Person_id', $student->id)->update($data_user);
        $data_student = array(
            'Names' => $names,
            'LastNames' => $lastnames,
            'Phone' => $phone,
            'Gender' => $values
        );
        Person::where('id',$student->id)->update($data_student);
        $log = new logs;
        $log->Table = "Estudiante";
        $log->User_ID = $responsible_user->name;
        $log->Description = "Se actualizaron los datos del estudiante ".$student->Names." ".$student->LastNames;
        $log->Type = "Actualizar";
        $log->save();
        return response()->json(["Accion completada"]);
    }

    public function delete($id, Request $request)
    {
        $code = $request->session()->get('User_id');
        $responsible_user = User::find($code);
        $person = Person::find($id);
        $user = User::where('Person_id',$person->id)->first();
        $data_user = array('State' => 'Desactivated');
        $log = new logs;
        $log->Table = "Estudiante";
        $log->User_ID = $responsible_user->name;
        $log->Description = "El usuario ".$user->name." ha sido eliminado";
        $log->Type = "Eliminar";
        $log->save();
        User::where('Person_id', $id)->update($data_user);
        Assign_user_rol::where('user_id',$user->id)->update($data_user);
        Assign_student_grade::where('user_id',$user->id)->update($data_user);
        return redirect()->route('ListStudent');
    }

    public function activate($id, Request $request)
    {
        $code = $request->session()->get('User_id');
        $responsible_user = User::find($code);
        $person = Person::find($id);
        $user = User::where('Person_id',$person->id)->first();
        $data_user = array('State' => 'Active');
        $log = new logs;
        $log->Table = "Estudiante";
        $log->User_ID = $responsible_user->name;
        $log->Description = "Se habilito el usuario ".$user->name;
        $log->Type = "Activar";
        $log->save();
        User::where('Person_id', $id)->update($data_user);
        Assign_user_rol::where('user_id',$user->id)->update($data_user);
        Assign_student_grade::where('user_id',$user->id)->update($data_user);
        return redirect()->route('ListEliminatedStudents');
    }

    public function restore_password(Request $request, $id)
    {
        $code = $request->session()->get('User_id');
        $responsible_user = User::find($code);
        $data = $request->data[0];
        if($data['Contraseña'] == null)
        {
            return response()->json(["id"=>"La contraseña no puede estar vacia"]);
        }
        $user = User::where('Person_id',$id)->first();
        $user->PasswordRestore = "Change";
        $user->password = bcrypt($data['Contraseña']);
        $user->Save();
        $log = new logs;
        $log->Table = "Estudiante";
        $log->User_ID = $responsible_user->name;
        $log->Description = "Se ha restablecido la contraseña del usuario: ".$user->name;
        $log->Type = "Restore";
        $log->save();
        return response()->json(["Accion completada"]);
    }

    public function edit_assign($id)
    {
        $year = date("Y");
        $user = User::where(['Person_id'=>$id,'State'=>'Active'])->first();
        $assign = Assign_student_grade::where(['user_id'=>$user->id,'Year'=>$year,'State'=>'Active'])->first();
        $grade = grade::find($assign->Grade_id);
        return view('Administration/Student/edit_assign',compact('user','grade'));
    }

    public function update_assign(Request $request)
    {
        $code = $request->session()->get('User_id');
        $responsible_user = User::find($code);
        $year = date("Y");
        $data = $request->data[0];
        $user = User::find($data['Usuario']);
        $student = Person::where('id',$user->Person_id)->first();
        $grade = grade::find($data['Grado']);
        if ($grade == null)
        {
            return response()->json(['Error' => "Debe seleccionar el grado en el cual será inscrito el estudiante!"], 500);
        }
        $data_grade = array(
            'Grade_id' => $grade->id,
            'Year' => $year
        );
        Assign_student_grade::where('user_id',$user->id)->update($data_grade);
        $log = new logs;
        $log->Table = "Estudiante";
        $log->User_ID = $responsible_user->name;
        $log->Description = "El estudiante ".$student->Names." ".$student->LastNames." ha sido asignado al grado ".$grade->GradeName();
        $log->Type = "Actualizar";
        $log->Period_id = $grade->Period()->id;
        $log->save();
        return response()->json(["Accion completada"]);
    }

    public function test_list($id)
    {
        $year = date("Y");
        $titles = [];
        $models = [];
        $activities = Assign_activity::where(['Course_id'=>$id,'State'=>'Active'])->get();
        foreach($activities as $activity)
        {
            $data = [
                "name" =>$activity->Name,
                "no" =>count($activity->Tests()),
                "test" => $activity->Tests(),
            ];
            array_push($titles,$data);
        }
        $course = course::find($id);
        foreach($course->Grade()->Students() as $student)
        {
            $tests = [];
            foreach($activities as $activity)
            {
                if(count($activity->Tests()->where('Year',$year))>0)
                {
                    foreach($activity->Tests()->where('Year',$year) as $test)
                    {
                        $state = [];
                        $question = Question::where('Test_id',$test->id)->first();
                        $check = Note::where(['Test_id'=>$test->id,'Student_id'=>$student->Asssign_Grade()->id,'State'=>'Approved','Year'=>$year])->first();
                        if(($question == null) && ($check != null))
                        {
                            $state = "written";
                        }
                        if($question != null)
                        {
                            $answer = Asign_answer_test_student::where(['Question_id'=>$question->id,'Studen_id'=>$student->Asssign_Grade()->id])->first();
                            if($answer == null)
                            {
                                $state = "start";
                            }
                            $option = Asign_answer_test_student::where(['Question_id'=>$question->id,'Studen_id'=>$student->Asssign_Grade()->id,'State'=>'Qualified'])->first();
                            if(($answer == null) && ($check != null))
                            {
                                $state = "none";
                            }
                            if(($answer != null) && ($option == null))
                            {
                                $state = "qualify";
                            }
                            if(($option != null) && ($check != null))
                            {
                                $state = "approved";
                            }
                        }
                        $notes = Note::where(['Test_id'=>$test->id,'Student_id'=>$student->Asssign_Grade()->id,'State'=>'Approved','Year'=>$year])->get('Score');
                        $values =[
                            'Id' => $test->id,
                            'state' => $state,
                            'NoQuestions' => $test->NoQuestions(),
                            'notes' => $notes,
                        ];
                        array_push($tests,$values);
                    }
                }
                else{
                    $values =[
                        'Id' => 0,
                        'state' => 0,
                        'NoQuestions' => 0,
                        'notes' =>"0",
                    ];
                    array_push($tests,$values);
                }
            }
            
            $query = [
                'id' => $student->person()->id,
                'assign' => $student->Asssign_Grade()->id,
                'name' => $student->person()->Names,
                'lastname' => $student->person()->LastNames,
                'tests' => $tests
            ];
            array_push($models,$query);
        }
        $grade = grade::find($course->Grade_id)->GradeNamePeriod();
        return view('Administration/Student/test_list',compact('models','titles','course','grade'));
    }

    public function test($id,$assign)
    {
        $models = [];
        $scores = [];
        $titles = [
            'Preguntas',
            'Tipos de Pregunta',
            'Respuestas Correctas',
            'Respuestas del Estudiante',
            'Puntajes Obtenido'
        ];
        $year = date("Y");
        $assign_student = Assign_student_grade::find($assign);
        $user_student = User::find($assign_student->user_id);
        $student = Person::find($user_student->Person_id);
        $test = test::find($id);
        $activity = Assign_activity::find($test->Activity_id);
        $course = course::find($activity->Course_id);
        $assign_teacher = Asign_teacher_course::where(['Course_id'=>$course->id,'State'=>'Active'])->first();
        $user_student = User::find($assign_teacher->user_id);
        $teacher = Person::find($user_student->Person_id);
        $questions = $test->Questions();
        $notes = Note::where(['Test_id'=>$test->id,'Student_id'=>$assign_student->id,'State'=>'Approved','Year'=>$year])->get();
        foreach ($notes as $note)
        {
            $consult = [
                'final' => $note->Score,
                'percentage' => (100/($test->Score))*($note->Score)
            ];
            array_push($scores,$consult);
        }
        foreach($questions as $question)
        {
            $answer = Asign_answer_test_student::where(['Studen_id'=>$assign,'Question_id'=>$question->id,'State'=>'Qualified'])->first();
            $query = [
                "id" => $question->id,
                "question" => $question->Title,
                "type" => $question->Type,
                "correct" => $question->CorrectAnswers  ?? 'No aplica',
                "answer" => $answer->Answers ?? 'No contestada',
                "score" => $answer->Score ?? '0',
            ];
            array_push($models,$query);
        }
        return view('Administration/Student/test',compact('models','titles','student','test','course','teacher','scores'));
    }

    public function score($id)
    {
        $models = [];
        $grade = grade::find($id);
        $courses =$grade->courses();
        $titles=[];
        
            foreach ($grade->Students() as $user)
            {
                $notes =[];
                
                foreach($courses as $course)
                {
                    if(!in_array($course->Name,$titles))
                    {
                        array_push($titles,$course->Name);
                    }
                    $total = 0;
                    $student = Person::find($user->Person_id);
                    $assign = Assign_student_grade::where(['user_id'=>$user->id,"Year"=>date('Y')])->first();
                    $ns = Note::where(['Course_id'=>$course->id,"Student_id"=>$assign->id,"State"=>"Approved","Year"=>date('Y')])->get();
                    foreach($ns as $note)
                    {
                        $total = intval($total)+intval($note->Score);
                    }
                    array_push($notes,$total);
                }
                $query = [
                    'id' => $student->id,
                    'names' => $student->Names.$student->LastNames,
                    'assign' => $user->Asssign_Grade()->id,
                    'notes' => $notes,
                ];
                array_push($models,$query);
            }
            $grade = $grade->GradeNamePeriod();            
        return view('Administration/Student/score',compact('models','titles','grade'));
    }

    public function course_scores(Request $request,$id)
    {
        $assign = Assign_student_grade::find($id);
        $user = User::find($assign->user_id);
        $student = Person::find($user->Person_id);
        $titles = [];
        $models = [];
        $grade = Assign_student_grade::find($assign->id)->Grade();
        $courses = $grade->Courses();
        $data = [];
        foreach ($courses as $course)
        {
            $activities = Assign_activity::where([['Course_id',$course->id],['State','Active']])->get();
            foreach($activities as $activity)
            {
                if(!in_array($activity->Name,$data))
                {
                    array_push($data,$activity->Name);
                }
            }
        }
        $notesStuden =[];
        foreach ($data as $period)
        {
            $testData = [];
            foreach ($courses as $key=> $course)
            {
                $asignactivity = Assign_activity::where(['Name'=>$period,'Course_id'=>$course->id])->first();
                $tests =[];
                if($asignactivity)
                    $tests = test::where('Activity_id',$asignactivity->id)->get();
                if(count($tests)>0)
                {
                    foreach ($tests as $test)
                    {
                        if(!in_array($test->Title,$testData))
                        {
                            array_push($testData,$test->Title);
                        }
                    }
                }
            }
            if(count($testData)<=0)
            {
                $testData = ["Sin examenes"];
            }
            $title=[
                "Activity" => $period,
                "No" => count($testData),
                "Test"=>$testData
            ];
            array_push($titles,$title);
        }
        foreach ($titles as $value)
        {
            foreach ($value['Test'] as $test)
            {
                foreach ($courses as $key=> $course)
                {
                    $notes =[]; 
                    $id = $request->session()->get('User_id');
                    $year = date('Y');
                    $assign = Assign_student_grade::where(['user_id'=>$assign->user_id,'Year'=>$year])->first();
                    $asignactivity = Assign_activity::where(['Name'=>$value['Activity'],'Course_id'=>$course->id])->first();
                    $testInfo = null;
                    if($asignactivity)
                        $testInfo = test::where(['Activity_id'=>$asignactivity->id,'Title'=> $test])->first();
                    
                    if($testInfo!=null)
                    {
                        $note = Note::where(['Test_id'=>$testInfo->id,'Course_id'=>$course->id,"Student_id"=>$assign->id,"State"=>"Approved"])->first();
                        if($note!=null)
                        {
                            $n = [
                                "Note"=>$note->Score,
                                "Max"=>$testInfo->Score,
                                "Porcentage"=> ((100*intval($note->Score))/intval($testInfo->Score)),
                            ];
                            array_push($notes,$n);
                        }
                        else
                        {
                            array_push($notes,"No disponible");
                        }
                    }
                    else
                    {
                        array_push($notes,"N");
                    }
                    if(!isset($notesStuden[$key]))
                    {
                        $notesStuden[$key]=[];
                    }
                    array_push($notesStuden[$key],$notes);
                }
            }
        }
        foreach ($courses as $key=> $course)
        {
            $model = [
                "id" => $course->id,
                "Course"=>$course->Name,
                "Notes" =>$notesStuden[$key]
            ];
            array_push($models,$model);
        }
        return view('Administration/Student/course_scores',compact('models','titles','student','grade'));
    }
}
