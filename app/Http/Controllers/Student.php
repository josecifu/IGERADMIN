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
        $Titles = [ 'Nombre del Estudiante',
                    'No. Telefono',
                    'Nombre de Usuario',
                    'Correo Electronico',
                    'Ultima Cesion'];
        $Models = [];
        $rol = Assign_user_rol::where('Rol_id',2)->get('user_id');
        foreach ($rol as $i)
        {
            $user = User::find($i->user_id);
            $student = Person::find($user->Person_id);
            $query = [
                'name' => $student->Names . ' ' . $student->LastNames,
                'phone' => $student->Phone,
                'user' => $user->name,
                'email' => $user->email,
            ];
            array_push($Models,$query);
        }
        return view('Student/students_list',compact('Models','Titles'));
    }

    //lista de todos los estudiantes con opciones por: nivel-grados-seccion
    public function list_grade()
    {
        $period = Period::all();
        $level = Level::all();
        $grade = Grade::all();
        $section = DB::table('assign_period_grades')->select('Seccion')->groupby('Seccion')->get();
        $Titles = ['Nombre del Estudiante',
                    'No. Telefono',
                    'Nombre de Usuario',
                    'Correo Electronico',
                    'Ultima Cesion'];
        $Models = DB::table('assign_user_rols')
            ->select('people.Names','people.LastNames','people.Phone','users.name','users.email')
            ->join('users','users.id','=','assign_user_rols.user_id')
            ->join('people','people.id','=','users.Person_id')
            ->join('assign_student_grades','assign_student_grades.user_id','=','users.id')
            ->join('assign_period_grades','assign_period_grades.id','=','assign_student_grades.Grade_id')
            ->join('assign_level_grades','assign_level_grades.id','=','assign_period_grades.grade_level_id')
            ->join('grades','grades.id','=','assign_level_grades.Grade_id')
            ->where('assign_user_rols.rol_id',2)
            ->get();
        return view('Student/students_list_grade',compact('period','level','grade','section','Models','Titles'));
    }

    //visualizacion de notas con filtro: jornada, grado, nivel, curso
    public function score()
    {
        $period = Period::all();
        $level = Level::all();
        $grade = Grade::all();
        //$section = Assign_period_grade::all();
        $section = DB::table('assign_period_grades')->select('Seccion')->groupby('Seccion')->get();
        return view('Student/course_notes_view',compact('period','level','grade','section'));
    }














    //crear estudiante incluye asignacion de grado
    public function create()
    {
        $period = Period::all();
        $level = Level::all();
        $grade = Grade::all();
        $section = DB::table('assign_period_grades')->select('Seccion')->groupby('Seccion')->get();
        return view('Student/create_student',compact('period','level','grade','section'));
    }
    public function save(Request $request)
    {
        $id = $request->session()->get('User_id'); 
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        $Apellidos= $data['Apellido'];
        $Direccion= $data['Direccion'];
        $Telefono= $data['Telefono'];
        $FechaNacimiento= $data['FechaNacimiento'];
        $Usuario= $data['Usuario'];
        $Email= $data['Email'];
        $Contraseña= $data['Contraseña'];
        $G= $data['Grado'];
        $N= $data['Nivel'];
        $J= $data['Jornada'];
        $NG = Assign_level_grade::where('Level_id',$N)->where('Grade_id',$G)->first();
        $JNG = Assign_period_grade::where('grade_level_id',$NG->id)->where('Period_id',$J)->first();
        //LOGICA
        try {
              DB::beginTransaction();
                //Tabla peronas
                $person = new Person;
                $person->Names = $Nombres;
                $person->LastNames = $Apellidos;
                $person->Address = $Direccion;
                $person->Phone = $Telefono;
                $person->BirthDate = $FechaNacimiento;
                $person->save();
                //Tabla usuarios
                $user = new User;
                $user->name = $Usuario;
                $user->email = $Email;
                $user->password = bcrypt($Contraseña);
                $user->State = "Active";
                $user->Person_id =  $person->id;
                $user->save();
                //asignacion usuario a un rol
                $usuario_rol = new Assign_user_rol;
                $usuario_rol->rol_id = 3;
                $usuario_rol->user_id = $user->id;
                $usuario_rol->State = "Active";
                $usuario_rol->save();
                //logs
                $log = new logs;
                $log->Table = "People";
                $log->User_ID = $id;
                $log->Description = "Se creo nuevo voluntario con el id: ".$person->id;
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
                $log->Description = "ID: ".$usuario_rol->id." de la Asignacion de rol voluntario al usuario: ".$user->id;
                $log->Table = "Assign_teacher_courses";
                $log->User_ID = $id;
                $log->Description = "ID: ".$usuario_curso->id." de la Asignacion de curso al usuario: ".$user->id;
                $log->Type = "Create";
                $log->save();
                DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return response()->json(["Accion completada"]);
    }























    public function save_person(Request $request)
    {
        $id = $request->session()->get('User_id'); 
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        $Apellidos= $data['Apellido'];
        $Direccion= $data['Direccion'];
        $Telefono= $data['Telefono'];
        $FechaNacimiento= $data['FechaNacimiento'];
        $Usuario= $data['Usuario'];
        $Email= $data['Email'];
        $Contraseña= $data['Contraseña'];
        $Rol = $data['Rol'];
        try {
              DB::beginTransaction();
                $person = new Person;
                $person->Names = $Nombres;
                $person->LastNames = $Apellidos;
                $person->Address = $Direccion;
                $person->Phone = $Telefono;
                $person->BirthDate = $FechaNacimiento;
                $person->save();
                $user = new User;
                $user->name = $Usuario;
                $user->email = $Email;
                $user->password = bcrypt($Contraseña);
                $user->State = "Active";
                $user->Person_id =  $person->id;
                $user->save();
                $usuario_rol = new Assign_user_rol;
                $usuario_rol->rol_id = $Rol;
                $usuario_rol->user_id = $user->id;
                $usuario_rol->State = "Active";
                $usuario_rol->save();
                $log = new logs;
                $log->Table = "people y users";
                $log->User_ID = $id;
                $log->Description = "Se inserto un nuevo voluntario con el id: ".$person->id." y el usuario es: ".$user->name;
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
        $ModelsP = Person::find($id);
        $User = User::where('Person_id',$id)->first();
        $ModelsU = [
                'Usuario' => $User->name,
                'Email' => $User->email,
            ];
        return view('Administration/Personas/formEdit',compact('ModelsP','ModelsU'));
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
    public function view_tests()
    {
    }
    public function create_test_answer()
    {
    }
    public function save_test_answer()
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
}
