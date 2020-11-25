<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Logs;
use App\Models\Rol;
use App\Models\Assign_user_rol;
use App\Models\User;
use App\Models\Person;
use App\Models\Assign_student_grade;
use App\Models\Period;
use App\Models\Grade;
use App\Models\Level;
use App\Models\Course;
use App\Models\Asign_answer_test_student;
use App\Models\Question;
use App\Models\Test;
use App\Models\Note;
use App\Models\Assign_activity;
use App\Models\Asign_teacher_course;

class Student extends Controller
{
    #FUNCIONES DE ESTUDIANTE
    public function dashboard()
    {
        return view('Student/home');
    }

    public function score_list(Request $request)
    {
        $id = $request->session()->get('User_id');
        $titles = [];
        $models = [];
        $assign = Assign_student_grade::where('user_id',$id)->first();
        $grade = Assign_student_grade::find($assign->id)->Grade();
        $courses = $grade->Courses();
        foreach ($courses as $course)
        {
            $scores = [];
            $notes = Note::where('Course_id',$course->id)->get();
            foreach($notes as $activity)
            {
                $values = [
                    "activity" => $activity->Activity
                ];
                array_push($titles,$values);
            }
            foreach($notes as $note)
            {
                $data = [
                    "note" => $note->Score
                ];
                array_push($scores,$data);
            }
            $query = [
                'course' => $course->Name,
                'scores' => $scores
            ];
            array_push($models,$query);
        }
        //dd($titles);
        return view('Student/score_list',compact('models','titles'));
    }

    public function test_questions($id)
    {
        $models = [];
        $titles = [];
        $buttons=[];
        $button = [
            "Name" => 'Regresar al listado de examenes',
            "Link" => 'student/test/view',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $test = Test::find($id);
        return view('Student/test_form',compact('titles','buttons','test'));
    }

    public function save_answer(Request $request)
    {
        $id = $request->session()->get('User_id');
        $data = $request->data[0];
        $student = $data['Estudiante'];
        $question = $data['Pregunta'];
        $score = $data['Punteo'];
        $answer = $data['Respuesta'];
        try
        {
            DB::beginTransaction();
            $reply = new Asign_answer_test_student;
            $reply->Studen_id = $student;
            $reply->Question_id = $question;
            $reply->Score = $score;
            $reply->Answers = $answer;
            $reply->State = "Active";
            $reply->save();
            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
        }
        return response()->json(["Accion exitosa"]);
    }

    public function student_test_list(Request $request)
    {
        $id = $request->session()->get('User_id');
        $models = [];
        $assign = Assign_student_grade::where('user_id',$id)->first();
        $courses = $assign->Grade()->Courses();
        foreach($courses as $course)
        { 
            if($course->Tests())
            {
                foreach($course->Tests() as $test)
                {
                    $fecha_actual = date("d-m-Y");
                   
                    $StartDate = date("d-m-Y",strtotime($test->StartDate." - 5 days")); 
                    $date_now = strtotime(date("d-m-Y H:i:00"));
                    $date_teststart = strtotime($StartDate);
                    $EndDate = date("d-m-Y H:i:00",strtotime($test->EndDate)); 
                    $date_testend = strtotime($EndDate);
                    if($date_now >= $date_teststart)
                    {
                        if($date_now <=$date_testend)
                        {
                            
                            if($test->StartDate)
                            {
                                $query =[
                                    "id"=>$test->id,
                                    "course"=>$course->Name,
                                    "test"=>$test->Title,
                                    "start"=>$test->StartDate,
                                    "end"=>$test->EndDate,
                                    "score"=>$test->Score,
                                    "activity" => $test->Activity()->Name,
                                    "teacher"=> $course->Teacher()->Person()->Names." ".$course->Teacher()->Person()->LastNames
                                ];
                                array_push($models,$query);
                            }
                        }
                    }
                }
            }     
        }
   
        return view('Student/test_list',compact('models'));
    }

    public function all_tests(Request $request)
    {
        $id = $request->session()->get('User_id');
        $models = [];
        $assign = Assign_student_grade::where('user_id',$id)->first();
        $courses = $assign->Grade()->Courses();
        foreach($courses as $course)
        { 
            if($course->Tests())
            {
                foreach($course->Tests() as $test)
                {
                    $query =[
                        "id"=>$test->id,
                        "course"=>$course->Name,
                        "test"=>$test->Title,
                        "start"=>$test->StartDate,
                        "end"=>$test->EndDate,
                        "score"=>$test->Score,
                        "activity" => $test->Activity()->Name,
                        "teacher"=> $course->Teacher()->Person()->Names." ".$course->Teacher()->Person()->LastNames
                    ];
                    array_push($models,$query);
                }
            }     
        }
        //dd($models);
        return view('Student/tests',compact('models'));
    }


























































//mostrar notas por semetres    ->  visualizacion de notas por curso
    public function course_scores($id)
    {
        $models = [];
        $student = [];
        $titles = [
            'Id',
            'Curso',
            'Unidad I',
            'Unidad II',
            'Unidad III',
            'Unidad IV',
            'Nota final',
            'Actividades'
        ];
        $assigns = Assign_student_grade::where('id',$id)->get('user_id');
        foreach ($assigns as $assign)
        {
            $user = User::find($assign->user_id);
            $person = Person::find($user->Person_id);
            $data = [
                'name' => $person->Names . ' ' . $person->LastNames
            ];
            array_push($student,$data);
        }
        $grade = Assign_student_grade::find($id)->Grade();
        $courses = $grade->Courses();
        foreach ($courses as $course)
        {
            $unity = [];
            $final_note = 0;
            for ($i=1; $i<=4; $i++)
            {
                $total_activities = 0;
                $notes = Note::where([
                    'Studen_id' => $id,
                    'Course_id' => $course->id,
                    //'Unity' => $i
                ])->get();
                foreach ($notes as $note)
                {
                    $total_activities = $total_activities + intval($note->Score);
                }
                $unity[$i] = $total_activities;
                $final_note = $final_note + $total_activities;
            }
            $query = [
                'id' => $course->id,
                'course' => $course->Name,
                'first' => $unity[1],
                'second' => $unity[2],
                'third' => $unity[3],
                'fourth' => $unity[4],
                'final' => $final_note
            ];
            array_push($models,$query);
        }
        return view('Administration/Student/course_scores',compact('models','titles','student'));
    }

                            #funciones terminadas
/*-------------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------*/

    #FUNCIONES DE ADMINISTRACION
    public function list()
    {
        $buttons = [];
        $button = [
            "Name" => 'Añadir nuevo estudiante',
            "Link" => 'administration/student/create',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver lista de estudiantes deshabilitados',
            "Link" => 'administration/student/list/eliminated',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver logs',
            "Link" => 'administration/student/logs',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);        
        $models = [];
        $titles = [
            'Id',
            'Nombres',
            'Apellidos',
            'No. Teléfono',
            'Usuario',
            'Correo electrónico',
            'Grado',
            'Última conexión',
            'Acciones'
        ];
        $rols = Assign_user_rol::where('Rol_id',2)->where('State','Active')->get();
        foreach ($rols as $rol)
        {
            $user = User::find($rol->user_id);
            $student = Person::find($user->Person_id);
            $Assign = Assign_student_grade::where('User_id',$user->id)->get('Grade_id');
            foreach ($Assign as $a)
            {
                $grade = Grade::find($a->Grade_id);
                $query = [
                    'id' => $student->id,
                    'name' => $student->Names,
                    'lastname' => $student->LastNames,
                    'phone' => $student->Phone,
                    'user' => $user->name,
                    'email' => $user->email,
                    'grade' => $grade->GradeName(),
                    'conexion' => '17/11/2020'
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
            "Name" => 'Ver lista de estudiantes deshabilitados',
            "Link" => 'administration/student/list/eliminated',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver logs',
            "Link" => 'administration/student/logs',
            "Type" => "btn1"
        ];
        array_push($buttons,$button); 
        $models = [];
        $titles = [
            'Id',
            'Nombres',
            'Apellidos',
            'No. Teléfono',
            'Usuario',
            'Correo electrónico',
            'Última conexión',
            'Acciones'
        ];
        $grade = Grade::find($id);
        foreach ($grade->Students() as $user)
        {
            $student = Person::find($user->Person_id);
            $query = [
                'id' => $student->id,
                'name' => $student->Names,
                'lastname' => $student->LastNames,
                'phone' => $student->Phone,
                'user' => $user->name,
                'email' => $user->email,
                'conexion' => '17/11/2020'
            ];
            array_push($models,$query);
        }
        $grade = $grade->GradeName();
        return view('Administration/Student/list_bygrade',compact('models','titles','buttons','grade'));
    }

    public function eliminated_students()
    {
        $buttons = [];
        $button = [
            "Name" => 'Ver lista de estudiantes activos',
            "Link" => 'administration/student/list',
            "Type" => "btn1"
        ];
        array_push($buttons,$button); 
        $models = [];
        $titles = [
            'Id',
            'Nombres',
            'Apellidos',
            'No. Teléfono',
            'Usuario',
            'Correo electrónico',
            'Última conexión',
            'Acciones'
        ];
        $rols = Assign_user_rol::where('Rol_id',2)->where('State','Desactivated')->get('user_id');
        foreach ($rols as $rol)
        {
            $user = User::find($rol->user_id);
            $student = Person::find($user->Person_id);
            $query = [
                'id' => $student->id,
                'name' => $student->Names,
                'lastname' => $student->LastNames,
                'phone' => $student->Phone,
                'user' => $user->name,
                'email' => $user->email,
                'conexion' => '17/11/2020'
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
            "Name" => 'Ver lista de estudiantes deshabilitados',
            "Link" => 'administration/student/list/eliminated',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $models = [];
        $titles = [
            'Id',
            'Responsable',
            'Actividad',
            'Tipo',
            'Fecha y hora'
        ];
        $logs = Logs::where('Table','Estudiante')->orWhere('Table','Usuario')->orWhere('Table','Rol')->orWhere('Table','Grado')->get();
        foreach ($logs as $log)
        {
            $data = [
                'id' => $log->id,
                'responsible' => $log->User_Id,
                'activity' => $log->Description,
                'type' => $log->Type,
                'datatime' => $log->created_at
            ];
            array_push($models,$data);
        }
        return view('Administration/Student/logs',compact('models','titles','buttons'));
    }

    public function create()
    {
        return view('Administration/Student/create_form');
    }

    public function save(Request $request)
    {
        $id = $request->session()->get('User_id');
        $responsible = User::find($id);
        $data = $request->data[0];
        $names = $data['Nombre'];
        $lastnames = $data['Apellido'];
        $phone = $data['Telefono'];
        $gender = $data['Genero'];
        $username = $data['Usuario'];
        $email = $data['Correo'];
        $password = $data['Contraseña'];
        $year = date("Y");
        $grade = Grade::find($data['Grado']);
        try
        {
            DB::beginTransaction();
            $student = new Person;
            $student->Names = $names;
            $student->LastNames = $lastnames;
            $student->Phone = $phone;
            if ($gender == "true")
            {
                $student->Gender = 'Femenino';
            }
            else
            {
                $student->Gender = 'Masculino';
            }
            $student->save();
            $user = new User;
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
            $student_grades->Grade_id = $grade->id;
            $student_grades->Year = $year;
            $student_grades->State ="Active";
            $student_grades->save();
            $log = new Logs;
            $log->Table = "Estudiante";
            $log->User_ID = $responsible->name;
            $log->Description = "Se registro un nuevo estudiante: ".$student->Names." ".$student->LastNames;
            $log->Type = "Crear";
            $log->save();
            $log = new Logs;
            $log->Table = "Usuario";
            $log->User_ID = $responsible->name;
            $log->Description = "Se registro un nuevo usuario: ".$user->name;
            $log->Type = "Crear";
            $log->save();
            $log = new Logs;
            $log->Table = "Rol";
            $log->User_ID = $responsible->name;
            $log->Description = "Se ha asignado el rol Estudiante al usuario: ".$user->name;
            $log->Type = "Asignación";
            $log->save();
            $log = new logs;
            $log->Table = "Grado";
            $log->User_ID = $responsible->name;
            $log->Description = "Al estudiante: ".$student->Names." ".$student->LastNames." se le ha asignado a: ".$grade->GradeName();
            $log->Type = "Asignación";
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
        $id = $request->session()->get('User_id');
        $responsible = User::find($id);
        $data = $request->data[0];
        $names = $data['Nombre'];
        $lastnames = $data['Apellido'];
        $phone = $data['Telefono'];
        $username = $data['Usuario'];
        $email = $data['Email'];
        $personid = $data['Persona'];
        $data_user = array(
            'name' => $username,
            'email' => $email
        );
        User::where('Person_id', $personid)->update($data_user);
        $data_student = array(
            'Names' => $names,
            'LastNames' => $lastnames,
            'Phone' => $phone
        );
        Person::where('id',$personid)->update($data_student);
        $log = new logs;
        $log->Table = "Estudiante";
        $log->User_ID = $responsible->name;
        $log->Description = "Se actualizaron los datos del estudiante: ".$names." ".$lastnames;
        $log->Type = "Actualizar";
        $log->save();
        return response()->json(["Accion completada"]);
    }

    public function delete($id, Request $request)
    {
        $indentity = $request->session()->get('User_id');
        $responsible = User::find($indentity);
        $user = User::find($id);
        $data_user = array('State' => 'Desactivated');
        $log = new logs;
        $log->Table = "Estudiante";
        $log->User_ID = $responsible->name;
        $log->Description = "Se ha eliminado el usuario: ".$user->name;
        $log->Type = "Eliminar";
        $log->save();
        User::where('Person_id', $id)->update($data_user);
        Assign_user_rol::where('user_id',$id)->update($data_user);
        return redirect()->route('ListStudent');
    }

    public function activate($id, Request $request)
    {
        $indentity = $request->session()->get('User_id');
        $responsible = User::find($indentity);
        $user = User::find($id);
        $data_user = array('State' => 'Active');
        $log = new logs;
        $log->Table = "Estudiante";
        $log->User_ID = $responsible->name;
        $log->Description = "Se ha habilitado el usuario: ".$user->name;
        $log->Type = "Activar";
        $log->save();
        User::where('Person_id', $id)->update($data_user);
        Assign_user_rol::where('user_id',$id)->update($data_user);
        return redirect()->route('ListStudent');
    }

    public function test_list($id)
    {
        $titles = [];
        $models = [];
        $activities = Assign_activity::where('Course_id',$id)->get();
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
                foreach($activity->Tests() as $test)
                {
                    $values =[
                        "Id" => $test->id,
                        "NoQuestions" => $test->NoQuestions(),
                    ];
                    array_push($tests,$values);
                }
            }
            $query = [
                "id" =>$student->person()->id,
                "assign" =>$student->Asssign_Grade()->id,
                "name" =>$student->person()->Names,
                'lastname' => $student->person()->LastNames,
                "tests"=>$tests
            ];
            array_push($models,$query);
        }
        //dd($models);
        $grade = grade::find($course->Grade_id)->GradeName();
        return view('Administration/Student/test_list',compact('models','titles','course','grade'));
    }

    public function test($id,$assign)
    {
        $models = [];
        $titles = [
            'Preguntas',
            'Tipo de Pregunta',
            'Respuestas del estudiante',
            'Respuestas Correctas',
            'Punteo Obtenido',
            'Acciones'
        ];
        $assign_student = Assign_student_grade::find($assign);
        $user_student = User::find($assign_student->user_id);
        $student = Person::find($user_student->Person_id);
        $test = test::find($id);
        $activity = Assign_activity::find($test->Activity_id);
        $course = Course::find($activity->Course_id);
        $assign_teacher = Asign_teacher_course::where('Course_id',$course->id)->first();
        $user_student = User::find($assign_teacher->user_id);
        $teacher = Person::find($user_student->Person_id);
        $questions = $test->Questions();
        foreach($questions as $question)
        {
            $answer = Asign_answer_test_student::where(['Studen_id'=>$assign,'Question_id'=>$question->id])->first();
            $query = [
                "id" => $question->id,
                "question" => $question->Title,
                "type" => $question->Type,
                "answer" => $answer->Answers ?? 'No contestada',
                "correct" => $question->CorrectAnswers  ?? 'No aplica',
                "score" => $answer->Score ?? '0',
            ];
            array_push($models,$query);
        }
        return view('Administration/Student/test',compact('models','titles','student','test','course','teacher'));
    }

    public function score($id)
    {
        $models = [];
        $titles = [
            'Nombres',
            'Apellidos',
            'Última conexión',
            'Acciones'
        ];
        $grade = Grade::find($id);
        foreach ($grade->Students() as $user)
        {
            $student = Person::find($user->Person_id);
            $query = [
                'id' => $student->id,
                'name' => $student->Names,
                'lastname' => $student->LastNames,
                'assign' => $user->Asssign_Grade()->id,
                'conexion' => '17/11/2020'
            ];
            array_push($models,$query);
        }
        $grade = $grade->GradeName();
        return view('Administration/Student/score',compact('models','titles','grade'));
    }
/*-------------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------------*/
    public function view_calendar(){}
    public function statistics(){}
}
