<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Rol;
use App\Models\Assign_user_rol;
use App\Models\User;
use App\Models\Person;
use App\Models\Assign_student_grade;
use App\Models\Note;
use App\Models\Assign_period_grade;
use App\Models\Classroom;
use App\Models\Period;
use App\Models\Assign_level_grade;
use App\Models\Grade;
use App\Models\Level;
use App\Models\Asing_answer_test_student;
use App\Models\Asssign_schedule_course;
use App\Models\Schedule;
use App\Models\Test;
use App\Models\Information;
use App\Models\Assign_course_grade;
use App\Models\Asign_teacher_course;
use App\Models\Course;
use DB;

class Student extends Controller
{
    //ADMINISTRACION
    //lista de todos los estudiantes
    public function list()
    {
        $buttons =[];
        $button = [
            "Name" => 'Estudiantes deshibilitados',
            "Link" => 'administration/home/dashboard',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $titles = [ 'Nombre del estudiante',
                    'No. Teléfono',
                    'Fecha de nacimiento',
                    'Nombre de usuario',
                    'Correo electrónico',
                    'Ultima cesión'];
        $models = [];
        $rol = Assign_user_rol::where('rol_id',2)->get('user_id');
        foreach ($rol as $i)
        {
            $user = User::find($i->user_id);
            $student = Person::find($user->Person_id);
            $query = [
                'name' => $student->Names . ' ' . $student->LastNames,
                'phone' => $student->Phone,
                'birthdate' => $student->BirthDate,
                'user' => $user->name,
                'email' => $user->email
            ];
            array_push($models,$query);
        }
        return view('Administration/Student/list',compact('models','titles','buttons'));
    }

    //lista de todos los estudiantes con opciones por: jornada, nivel, grados
    public function list_grade($id)
    {
        $grade = grade::find($id);
        $models = Assign_student_grade::where('Grade_id',$id)->get();
        $titles ="";
        return view('Administration/Student/list_grade',compact('models','titles'));
    }

    //visualizacion de notas con filtro: jornada, grado, nivel, curso
    public function score()
    {
        $period = Period::all();
        $level = Level::all();
        $grade = Grade::all();
        $section = DB::table('assign_period_grades')->select('Seccion')->groupby('Seccion')->get();
        $titles = ['Nombre del estudiante','Profesor','Curso','I','II','III','IV'];
        $models = DB::table('assign_user_rols')
            ->select('people.Names','people.LastNames','courses.Name as course')
            ->join('users','users.id','=','assign_user_rols.user_id')
            ->join('people','people.id','=','users.Person_id')
            ->join('assign_student_grades','assign_student_grades.user_id','=','users.id')
            ->join('assign_period_grades','assign_period_grades.id','=','assign_student_grades.Grade_id')
            ->join('periods','periods.id','=','assign_period_grades.Period_id')
            ->join('assign_level_grades','assign_level_grades.id','=','assign_period_grades.grade_level_id')
            ->join('grades','grades.id','=','assign_level_grades.Grade_id')
            ->join('levels','levels.id','=','assign_level_grades.Level_id')
            ->join('assign_course_grades','assign_course_grades.Grade_id','=','assign_period_grades.id')
            ->join('courses','courses.id','=','assign_course_grades.Course_id')
            ->where('assign_user_rols.rol_id',2)
            ->get();
        return view('Administration/Student/course_notes',compact('period','level','grade','section','models','titles'));
    }













    //visualizacion de examenes
    public function tests()
    {
        $period = Period::all();
        $level = Level::all();
        $grade = Grade::all();
        $section = DB::table('assign_period_grades')->select('Seccion')->groupby('Seccion')->get();
        $titles = ['Curso','Profesor'];
        $models = DB::table('assign_user_rols')
            ->select('courses.Name as course','people.Names','people.LastNames')
            ->join('users','users.id','=','assign_user_rols.user_id')
            ->join('people','people.id','=','users.Person_id')
            ->where('assign_user_rols.rol_id',3)
            ->get();
        return view('Administration/Student/tests',compact('period','level','grade','section','models','titles'));
    }

    public function create()
    {
        $period = Period::all();
        $level = Level::all();
        $grade = Grade::all();
        $section = DB::table('assign_period_grades')->select('Seccion')->groupby('Seccion')->get();
        return view('Administration/Student/create_form',compact('period','level','grade','section'));
    }


















    //estudiante con asignacion de grado
    public function save(Request $request)
    {
        $id = $request->session()->get('User_id'); 
        $data = $request->data[0];
        $name = $data['Nombre'];
        $last_name = $data['Apellido'];
        $address = $data['Direccion'];
        $phone = $data['Telefono'];
        $birth_date = $data['FechaNacimiento'];
        $user = $data['Usuario'];
        $email = $data['Email'];
        $password = $data['Contraseña'];
        $grade = $data['Grado'];
        $level = $data['Nivel'];
        $period = $data['Jornada'];
        $level_grade = Assign_level_grade::where('Level_id',$level)->where('Grade_id',$grade)->first();
        $period_grade = Assign_period_grade::where('grade_level_id',$level_grade->id)->where('Period_id',$period)->first();
        //LOGICA
        try {
              DB::beginTransaction();
                //perona
                $person = new Person;
                $person->Names = $name;
                $person->LastNames = $last_name;
                $person->Address = $address;
                $person->Phone = $phone;
                $person->BirthDate = $birth_date;
                $person->save();
                //usuario
                $user = new User;
                $user->name = $user;
                $user->email = $email;
                $user->password = bcrypt($password);
                $user->State = "Active";
                $user->Person_id =  $person->id;
                $user->save();
                //asignacion usuario de rol
                $user_rol = new Assign_user_rol;
                $user_rol->rol_id = 3;
                $user_rol->user_id = $user->id;
                $user_rol->State = "Active";
                $user_rol->save();
                //asignacion de grado


                //logs
                $log = new logs;
                $log->Table = "People";
                $log->User_ID = $id;
                $log->Description = "Se creo nuevo estudiante con el id: ".$person->id;
                $log->Type = "Create";
                $log->save();
                $log = new logs;
                $log->Table = "users";
                $log->User_ID = $id;
                $log->Description = "Se creo nuevo usuario con nombre: ".$user->name." y correo: ".$user->email;
                $log->Type = "Create";
                $log->Type = "Create";
                $log->save();
                $log = new logs;
                $log->save();
                $log = new logs;
                $log->Table = "Assign_user_rol";
                $log->User_ID = $id;
                $log->Description = "ID: ".$user_rol->id." de la Asignacion de rol estudiante al usuario: ".$user->id;
                $log->Type = "Create";
                $log->save();
                DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(["Accion completada"]);
    }

    //actualizar estudiante
    public function edit($id)
    {
        $person_models = Person::find($id);
        $User = User::where('Person_id',$id)->first();
        $user_models = [
                'Usuario' => $User->name,
                'Email' => $User->email,
            ];
        return view('Administration/Student/edit_form',compact('person_models','user_models'));
    }

    //Funciones de Actualizar
    public function update($id, Request $request)
    {
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
            'Person_id' => $PersonaID ,
        );
        User::where('Person_id', $id)->update($dataU);
        //LOGICA Persona
        $dataP=array(
            'Names' => $Nombres,
            'LastNames' => $Apellidos,
            'Address' => $Direccion,
            'Phone' => $Telefono,
            'BirthDate' =>$FechaNacimiento,
        );
        Person::where('id',$id)->update($dataP);
        $log = new logs;
        $log->Table = "people y users";
        $log->User_ID = $id;
        $log->Description = "Se actualizo una persona con el id: ".$id." y correo ".$Email;
        $log->save(); 
        return response()->json(["Accion completada"]);
    }



















    //ESTUDIANTE
    public function edit_profile()
    {
    }
    public function update_profile()
    {
    }
    public function view_course_teachers_notes(Request $request)
    {
    }
    public function view_teacher_information(Request $request)
    {
    }
    public function view_tests(Request $request)
    {
        $id = $request->session()->get('User_id');
        $titles = ['Dia','Inicia','Finaliza','Tipo','Curso'];
        $models = DB::table('users')
            ->select('','')
            ->join('assign_student_grades','assign_student_grades.user_id','=','users.id')
            ->join('assign_answer_test_students','assign_answer_test_students.Student_id','=','assign_student_grades.id')
            ->join('assign_question_tests','assign_question_tests.id','=','assign_answer_test_students.Question_id')
            ->join('tests','tests.id','=','assign_question_tests.Test_id')
            ->join('assign_period_grades','assign_period_grades.id','=','assign_student_grades.Grade_id')
            ->join('periods','periods.id','=','assign_period_grades.Period_id')
            ->join('assign_level_grades','assign_level_grades.id','=','assign_period_grades.grade_level_id')
            ->join('grades','grades.id','=','assign_level_grades.Grade_id')
            ->join('levels','levels.id','=','assign_level_grades.Level_id')
            ->join('assign_course_grades','assign_course_grades.Grade_id','=','assign_period_grades.id')
            ->join('courses','courses.id','=','assign_course_grades.Course_id')
            ->where('users.id',$id)
            ->get();
        return view('Student/tests',compact('models','titles'));
    }
    public function create_test_answer()
    {
    }
    public function save_test_answer()
    {
    }
    public function view_schedule(Request $request)
    {
        $id = $request->session()->get('User_id');
        $titles = ['Dia','Inicia','Finaliza','Tipo','Curso'];
        $models = DB::table('users')
            ->select('schedules.Day','schedules.StartHour','schedules.EndHour','schedules.Type','courses.Name')
            ->join('assign_student_grades','assign_student_grades.user_id','=','users.id')
            ->join('assign_period_grades','assign_period_grades.id','=','assign_student_grades.Grade_id')
            ->join('periods','periods.id','=','assign_period_grades.Period_id')
            ->join('assign_level_grades','assign_level_grades.id','=','assign_period_grades.grade_level_id')
            ->join('grades','grades.id','=','assign_level_grades.Grade_id')
            ->join('levels','levels.id','=','assign_level_grades.Level_id')
            ->join('assign_course_grades','assign_course_grades.Grade_id','=','assign_period_grades.id')
            ->join('courses','courses.id','=','assign_course_grades.Course_id')
            ->join('assign_schedule_courses','assign_schedule_courses.Course_id','=','assign_course_grades.id')
            ->join('schedules','schedules.id','=','assign_schedule_courses.Schedule_id')
            ->where('users.id',$id)
            ->get();
        return view('Student/schedule',compact('models','titles'));
    }
    public function view_forms()
    {
    }
    public function view_calendar()
    {
    }
}
