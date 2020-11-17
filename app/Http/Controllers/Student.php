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
//
use App\Models\Asign_file_question_test;
use App\Models\Assign_fields;
use App\Models\field;
use App\Models\Information;
use App\Models\Schedule;

class Student extends Controller
{
    #ADMINISTRACION
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
            'Nombre del estudiante',
            'No. Teléfono',
            'Nombre de usuario',
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
                    'name' => $student->Names . ' ' . $student->LastNames,
                    'phone' => $student->Phone,
                    'user' => $user->name,
                    'email' => $user->email,
                    'grade' => $grade->GradeName()
                ];
                array_push($models,$query);
            }
        }
        return view('Administration/Student/list',compact('models','titles','buttons'));
    }

    public function list_grade($id)
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
            'Nombre del estudiante',
            'No. Teléfono',
            'Nombre de usuario',
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
                'name' => $student->Names . ' ' . $student->LastNames,
                'phone' => $student->Phone,
                'user' => $user->name,
                'email' => $user->email
            ];
            array_push($models,$query);
        }
        $grade = $grade->GradeName()." del circulo de estudio (".$grade->Period()->Name.")";
        return view('Administration/Student/list_grade',compact('models','titles','buttons','grade'));
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
            'Nombre del estudiante',
            'No. Teléfono',
            'Nombre de usuario',
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
                'name' => $student->Names . ' ' . $student->LastNames,
                'phone' => $student->Phone,
                'user' => $user->name,
                'email' => $user->email
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
        $titles = [
            'Id',
            'Usuario responsable',
            'Actividad',
            'Tipo',
            'Fecha y hora'
        ];
        $logs = Logs::where('Table','Estudiante')->get();
        $models = [];
        foreach ($logs as $log)
        {
            $data = [
                'id' => $log->id,
                'user' => $log->User_Id,
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
        $data = $request->data[0];
        $names = $data['Nombre'];
        $lastnames = $data['Apellido'];
        $phone = $data['Telefono'];
        $username = $data['Usuario'];
        $email = $data['Correo'];
        $password = $data['Contraseña'];
        $grade = Grade::find($data['Grado']);
        try
        {
            DB::beginTransaction();
            $student = new Person;
            $student->Names = $names;
            $student->LastNames = $lastnames;
            $student->Phone = $phone;
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
            $student_grades->Year = "2020";
            $student_grades->State ="Active";
            $student_grades->save();
            $log = new Logs;
            $log->Table = "Estudiante";
            $log->User_ID = $id;
            $log->Description = "Se registro nuevo estudiante: ".$student->Names." ".$student->LastNames;
            $log->Type = "Create";
            $log->save();
            $log = new Logs;
            $log->Table = "Usuario";
            $log->User_ID = $id;
            $log->Description = "Se registro un nuevo usuario: ".$user->username;
            $log->Type = "Create";
            $log->save();
            $log = new Logs;
            $log->Table = "Rol";
            $log->User_ID = $id;
            $log->Description = "Se ha asignado el rol Estudiante al usuario: ".$user->name;
            $log->Type = "Assign";
            $log->save();
            $log = new logs;
            $log->Table = "Grado";
            $log->User_ID = $id;
            $log->Description = "El estudiante: ".$student->Names." ".$student->LastNames."se le ha asignado a: ".$grade->Name;
            $log->Type = "Assign";
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
        $log->Table = "peoples and users";
        $log->User_ID = $id;
        $log->Description = "Se actualizaron los datos del estudiante: ".$names." ".$lastnames;
        $log->Type = "Update";
        $log->save();
        return response()->json(["Accion completada"]);
    }

    public function delete($id, Request $request)
    {
        $indentity = $request->session()->get('User_id');
        $user_logged = User::find($indentity);
        $user = User::find($id);
        $data_user = array('State' => 'Desactivated');
        $log = new logs;
        $log->Table = "Estudiante";
        $log->User_ID = $user_logged->name;
        $log->Description = "Se ha eliminado el usuario: ".$user->name;
        $log->Type = "Delete";
        $log->save();
        User::where('Person_id', $id)->update($data_user);
        Assign_user_rol::where('user_id',$id)->update($data_user);
        return redirect()->route('ListStudent');
    }

    public function activate($id, Request $request)
    {
        $indentity = $request->session()->get('User_id');
        $user_logged = User::find($indentity);
        $user = User::find($id);
        $data_user = array('State' => 'Active');
        $log = new logs;
        $log->Table = "Estudiante";
        $log->User_ID = $user_logged->name;
        $log->Description = "Se ha habilitado el usuario: ".$user->name;
        $log->Type = "Active";
        $log->save();
        User::where('Person_id', $id)->update($data_user);
        Assign_user_rol::where('user_id',$id)->update($data_user);
        return redirect()->route('ListStudent');
    }

    public function score($id)
    {
        $models = [];
        $titles = [
            'Id',
            'Nombre del estudiante',
            'Última conexión',
            'Acciones'
        ];
        $grade = Grade::find($id);
        foreach ($grade->Students() as $user)
        {
            $student = Person::find($user->Person_id);
            $query = [
                'id' => $student->id,
                'student' => $student->Names . ' ' . $student->LastNames,
                'assign' => $user->Asssign_Grade()->id
            ];
            array_push($models,$query);
        }
        $grade = $grade->GradeName();
        return view('Administration/Student/score',compact('models','titles','grade'));
    }

    //falta agregar modal para ver actividades
    public function course_scores($id)
    {
        $models = [];
        $student = [];
        $titles = [
            'Id',
            'Curso',
            'Semestre I',
            'Semestre II',
            'Semestre III',
            'Semestre IV',
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
                    'Unity' => $i
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

    public function list_test($id)
    {
        $models = [];
        $titles = [
            'Id',
            'Nombre del Estudiante',
            'Primera Unidad',
            'Segunda Unidad',
            'Tercera Unidad',
            'Cuarta Unidad',
        ];
        $course = Course::find($id);
        $grade = Grade::find($id);
        foreach ($grade->Students() as $user)
        {
            $student = Person::find($user->Person_id);
            $query = [
                'id' => $student->id,
                'student' => $student->Names . ' ' . $student->LastNames,
                'assign' => $user->Asssign_Grade()->id
            ];
            array_push($models,$query);
        }
        $grade = Grade::find($course->Grade_id)->GradeName();
        return view('Administration/Student/list_test',compact('models','titles','course','grade'));
    }

    //conexion directa a examen
    //falta visualizar respuestas y modal ver pregunta
    public function test($id)
    {
        $models = [];
        $titles = [
            'Id',
            'Preguntas',
            'Tipo de Pregunta',
            'Respuestas del estudiante',
            'Respuestas Correctas',
            'Punteo Obtenido',
            'Acciones'
        ];
        $answers = Asign_answer_test_student::where('Studen_id',$id)->get();
        foreach ($answers as $answer)
        {
            $question = Question::find($answer->Question_id);
            //dd($question);
            $query = [
                'id' => $question->id,
                'question' => $question->Content,
                'type' => $question->Type,
                'correct' => $question->CorrectAnswers,
            ];
            array_push($models,$query);
        }
        $test = Test::where('id',$question->Test_id)->get('Title');
        $score = Test::where('id',$question->Test_id)->get('Score');
        return view('Administration/Student/test',compact('models','titles','test','score'));
    }







































    #ESTUDIANTE
    public function test_view()
    {
        return view('Student/test_view');
    }
    public function question_answer()
    {
        return view('Student/test_view');
    }
    public function save_answer()
    {
    }





























    public function view_course_teachers_notes()
    {
    }
    public function edit_profile($id)
    {
        $student = Person::find($id);
        $user = User::where('Person_id',$id)->first();
        $models = [
            'Usuario' => $user->name,
            'Email' => $user->email
        ];
        return view('Student/edit_profile',compact('student','models'));
    }
    public function update_profile(Request $request)
    {
        $id = $request->session()->get('User_id');
        $data = $request->data[0];
        $username = $data['Usuario'];
        $email = $data['Email'];
        $password = $data['Contraseña'];
        $phone = $data['Telefono'];
        $personid = $data['Persona'];
        $data_user = array(
            'name' => $username,
            'email' => $email
        );
        User::where('Person_id', $personid)->update($data_user);
        $data_student = array(
            'Phone' => $phone
        );
        Person::where('id',$personid)->update($data_student);
        $log = new logs;
        $log->Table = "peoples and users";
        $log->User_ID = $id;
        $log->Description = "Se actualizaron los datos del estudiante: ".$names." ".$lastnames;
        $log->Type = "Update";
        $log->save();
        return response()->json(["Accion completada"]);
    }

    //////////////////////////////////////////
    public function view_teacher_information()
    {
    }
    public function view_schedule()
    {
    }
    public function view_forms()
    {
    }
    public function view_calendar()
    {
    }
    public function statistics()
    {
    }
}
