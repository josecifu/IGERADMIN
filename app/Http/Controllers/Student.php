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

class Student extends Controller
{
    //ADMINISTRACION
    //lista de todos los estudiantes
    public function list()
    {
        $Titles = [ 'Nombre del Estudiante',
                    'Direccion',
                    'No. Telefono',
                    'Fecha de Nacimiento',
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
                'direction' => $student->Address,
                'phone' => $student->Phone,
                'birth_date' => $student->BirthDate,
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
        $Titles = ['Grado'];
        $Models = [];
/*
        $rol = Assign_user_rol::where('rol_id',2)->get('user_id');
        foreach ($rol as $j)
        {
            $student_grade = Assign_student_grade::find($j->user_id);
            $period_grade = Assign_period_grade::find($student_grade);
        }
*/
        $period_grade = Assign_period_grade::where('Seccion','A')->get('grade_level_id');
        foreach ($period_grade as $i)
        {
            $level_grade = Assign_level_grade::find($i->grade_level_id);
            $grade = Grade::find($level_grade->Grade_id);
            $data = ['info' => $grade->Name];
            array_push($Models,$data);
        }
        return view('Student/students_list_grade',compact('Models','Titles'));
    }

    //visualizacion de notas con filtro: jornada, grado, nivel, curso
    public function score(Request $request)
    {

        $data = DB::table('users')->join('assign_user_rols','assign_user_rols.user_id','=','users.id')->select('users.name')->where('assign_user_rols.rol_id','=',2)->get();

        //dd($data);


    }














    //crear estudiante incluye asignacion de grado
    public function create()
    {
        return view('Student.create_student');
    }
    public function save(Request $request)
    {
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        $Apellidos= $data['Apellido'];
        $person = new Person;
        $person->Names = $Nombres;
        $person->LastNames = $Apellidos;
        $person->save();
        $logs = new Log;
        $logs->Table = "Estudiante";
        $logs->User_Id = $request->session()->get('User_Id');
        $logs->Description = "Se guardo cliente ID = ".$person->id." Nombre = ".$person->LastNames;
        $logs->save();
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
    public function view_course_teachers_notes()
    {
        //$titles = ['Id','Curso','Profesor','No. Telefono'];
        //$teacher = Person::all();
        //$models=[];
        //$id = $request->session()->get('User_id');
        //$studentgrade = Assign_student_grade::where('User_id',$id)->get('Grade_id');
        //return view('Student/Estudiante/Listado_Curso_Voluntario',compact('titles','models'));
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
