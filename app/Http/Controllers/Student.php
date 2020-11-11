<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\logs;
use App\Models\Rol;
use App\Models\Assign_user_rol;
use App\Models\User;
use App\Models\Person;
use App\Models\Assign_student_grade;
use App\Models\Note;
use App\Models\Classroom;
use App\Models\Period;
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

class Student extends Controller
{
    //ADMINISTRACION
    //lista de todos los estudiantes
    public function list()
    {
        $buttons =[];
        $button = [
            "Name" => 'Estudiantes deshibilitados',
            "Link" => 'administration/student/eliminated_students',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $titles = [ 'Id',
                    'Nombre del estudiante',
                    'No. Teléfono',
                    'Fecha de nacimiento',
                    'Nombre de usuario',
                    'Correo electrónico',
                    'Ultima cesión'];
        $rol = Assign_user_rol::where('Rol_id',2)->where('State','Active')->get('user_id');
        foreach ($rol as $i)
        {
            $user = User::find($i->user_id);
            $student = Person::find($user->Person_id);
            $query = [
                'id' => $student->id,
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
        $buttons =[];
        $button = [
            "Name" => 'Estudiantes deshibilitados',
            "Link" => 'administration/student/eliminated_students',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $models = [];
        $titles = [ 'Nombre del estudiante',
                    'No. Teléfono',
                    'Fecha de nacimiento',
                    'Nombre de usuario',
                    'Correo electrónico',
                    'Ultima cesión'];
        $grade = grade::find($id);
        $rol = Assign_user_rol::where('Rol_id',2)->where('State','Active')->get('user_id');
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
        return view('Administration/Student/list_grade',compact('models','titles','buttons'));
    }

    public function eliminated_students()
    {
        $buttons =[];
        $button = [
            "Name" => 'Estudiantes activos',
            "Link" => 'administration/student/list',
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
        $rol = Assign_user_rol::where('Rol_id',2)->where('State','Desactivated')->get('user_id');
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
        return view('Administration/Student/eliminated_students',compact('models','titles','buttons'));
    }

    public function create()
    {
        return view('Administration/Student/create_form');
    }

    //estudiante con asignacion de grado
    public function save(Request $request)
    {
        $id = $request->session()->get('User_id'); 
        $data = $request->data[0];
        $names= $data['Nombre'];
        $lastnames= $data['Apellido'];
        $address= $data['Direccion'];
        $phone= $data['Telefono'];
        $birthdate= $data['Nacimiento'];
        $username= $data['Usuario'];
        $email= $data['Correo'];
        $password = $data['Contraseña'];
        $grade = grade::find($data['Grado']);        
        try {
              DB::beginTransaction();
                $student = new Person;
                $student->Names = $names;
                $student->LastNames = $lastnames;
                $student->Address = $address;
                $student->Phone = $phone;
                $student->BirthDate = $birthdate;
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
                $student_grades->save();
                $log = new logs;
                $log->Table = "Estudiante";
                $log->User_ID = $id;
                $log->Description = "Se registro un nuevo estudiante con indentificación: ".$student->id;
                $log->Type = "Create";
                $log->save();
                $log = new logs;
                $log->Table = "Usuario";
                $log->User_ID = $id;
                $log->Description = "Se registro un nuevo usuario con nombre: ".$user->username;
                $log->Type = "Create";
                $log->save();
                $log = new logs;
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
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(["Accion exitosa"]);
    }

    public function edit($id)
    {
        $student = Person::find($id);
        $user = User::where('Person_id',$id)->first();

        $models = ['Usuario' => $user->name, 'Email' => $user->email];
        return view('Administration/Student/edit_form',compact('student','models'));
    }

    //actualizar estudiante con usuario
    public function update(Request $request)
    {
        $id = $request->session()->get('User_id');
        $data = $request->data[0];
        $names= $data['Nombre'];
        $lastnames= $data['Apellido'];
        $address= $data['Direccion'];
        $phone= $data['Telefono'];
        $birthdate= $data['FechaNacimiento'];
        $username = $data['Usuario'];
        $email= $data['Email'];
        $personid = $data['Persona'];
        $data_user=array(
            'name' => $username,
            'email' => $email,
        );
        User::where('Person_id', $personid)->update($data_user);
        $data_student=array(
            'Names' => $names,
            'LastNames' => $lastnames,
            'Address' => $address,
            'Phone' => $phone,
            'BirthDate' =>$birthdate,
        );
        Person::where('id',$personid)->update($data_student);
        $log = new logs;
        $log->Table = "peoples and users";
        $log->User_ID = $id;
        $log->Description = "Se actualizaron los datos del estudiante con indentificación: ".$personid;
        $log->Type = "Update";
        $log->save();
        return response()->json(["Accion completada"]);
    }

    //deshabilitar usuario de estudiante
    public function delete($id, Request $request)
    {
        $indentity = $request->session()->get('User_id');
        $user_logged = User::find($indentity);
        $user = User::find($id);
        $data_user=array(
            'State' => 'Desactivated',
        );
        $log = new logs;
        $log->Table = "Estudiante";
        $log->User_ID = $user_logged->name;
        $log->Description = "Se ha eliminado el usuario: ".$user->name;
        $log->Type = "Delete";
        $log->save();
        User::where('Person_id', $id)->update($data_user);
        Assign_user_rol::where('user_id',$id)->update($data_user);
        return redirect()->route('listStudent');
    }

    //visualizacion de notas con filtro: jornada, grado, nivel, curso
    public function score($id)
    {
    }

    //visualizacion de examenes con respuestas de cada alumno por grado-seccion
    public function tests($id)
    {
        /*
        $titles = ['Curso'];
        $grade = grade::find($id);
        $models = Course::where('Grade_id',$id)->get('Name');
        return view('Administration/Student/tests',compact('models','titles'));
        */
    }

    //agregar estas rutas
    //Route::get('/delete/{model}', $route.'\Teacher@delete')->name('DeleteTeacher');
    //Route::get('/lists/eliminated',$route.'\Student@eliminated_students')->name('ListEliminatedStudents');










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
    }
    public function create_test_answer()
    {
    }
    public function save_test_answer()
    {
    }
    public function view_schedule(Request $request)
    {
    }
    public function view_forms()
    {
    }
    public function view_calendar()
    {
    }
}
