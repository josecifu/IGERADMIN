<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tabla de informacion
use App\Models\information;
//tabla de asignacion de informacion
use App\Models\Assign_files_information;
//tabla de notas
use App\Models\note;
//tabla de evaluaciones
use App\Models\Test;
//tabla de preguntas
use App\Models\Question;
//tabla de asignacion de preguntas a prueba
use App\Models\Asign_question_test;
//tabla de asignacion de prueba a curso
use App\Models\asign_test_course;
//tabla de asignacion de estudiante grado
use App\Models\Assign_student_grade;
//tabla de Asignacion cursos a grados
use App\Models\Assign_course_grade;
//tabla de Asignacion cursos a grados
use App\Models\Asign_teacher_course;
//tabla de Asignacion usuario rol
use App\Models\Assign_user_rol;
//tabla de Asignacion nivel grado
use App\Models\Assign_level_grade;
//tabla de Asignacion periodo nivel/grado
use App\Models\Assign_period_grade;
//tabla de cursos
use App\Models\course;
//tabla de usuarios
use App\Models\User;
//tabla de Personas
use App\Models\Person;
//tabla de grado
use App\Models\grade;
//tabla de Jornadas
use App\Models\period;
#Tabla nivel
use App\Models\level;
#Tabla logs
use App\Models\logs;
use Illuminate\Support\Facades\DB;

class Teacher extends Controller
{
    public function workspace()
    {
        $buttons =[];
        $button = [
            "Name" => 'Info',
            "Link" => '#',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        return view('Administration/Teachers/dashboard',compact('buttons'));
    }
    public function View_Assigned_Student(Request $request)
    {
        $Titles = ['Id','Nombre','Apellido','Correo','Telefono','Grado'];
        $muestra = Person::all();
        $Models=[];        
        $id = $request->session()->get('User_id'); 
        $CursosVoluntario = Asign_teacher_course::where('user_id',$id)->get('Course_id');
        $gradoID = [];
        $asignacionStudentGradeID = [];
        $estudiantes = [];
        foreach ($CursosVoluntario as $value) {
            $cursoGrado = Assign_course_grade::where('Course_id',$value)->get('Grade_id');
        }
        $grado = grade::where('id',$cursoGrado);
        $asignacionStudentGrade = Assign_student_grade::where('Grade_id',$grado)->get('user_id');
        foreach ($asignacionStudentGrade as $value) {
            $datos = Person::all();
        }
        return view('Administration/Teachers/ListadoEstudiantes',compact('Titles','Models'));
    }
    public function View_Student_Scores()
    {
        $NIVELES = grade::find(5)->Level();
        $Titles = ['Id','Nombre del Estudiante','Curso','Grado','P1','P2','P3','P4','Final','Acciones'];
        return view('Administration/Teachers/NotasEstudiantes',compact('Titles'));
    }
    public function TestTeacher(Request $request,$id)
    {
        dd(grade::find($id));
    }
    public function list() //Visualizcion tabla Voluntarios con usuario
    {
        $buttons =[];
        $button = [
            "Name" => 'Añadir un voluntario',
            "Link" => 'administration/teacher/create',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver Voluntarios inactivos',
            "Link" => 'administration/teacher/desactive',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver Logs Voluntarios',
            "Link" => 'administration/teacher/logs',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $Titles =['Id','Nombres','Apellidos','Direccion','Telefono','Fecha Nacimiento','Usuario','Email', 'Acciones'];
        $usuario_rol = Assign_user_rol::where('Rol_id',3)->where('State','Active')->get('user_id');
        $Models = [];
        foreach ($usuario_rol as $v) {
            $usuario = User::find($v->user_id);
            $persona = Person::find($usuario->Person_id);
                $data = [
                    'Id' => $persona->id,
                    'Name' => $persona->Names,
                    'Apellido' => $persona->LastNames,
                    'Direccion' => $persona->Address,
                    'Telefono' => $persona->Phone,
                    'Fecha_Nacimiento' => $persona->BirthDate,
                    'Usuario' => $usuario->name,
                    'Correo' => $usuario->email,
                ];
                array_push($Models,$data);
        }
        return view('Administration/Teachers/ListadoVoluntarios',compact('Models','Titles','buttons'));
    }
    public function create()
    {
        $buttons =[];
        $button = [
            "Name" => 'Listado Voluntarios',
            "Link" => 'administration/teacher/list',
            "Type" => "add"
        ];  
        $Cursos = course::all();
        $Grados = grade::all();
        $Niveles = level::all();
        $Jornadas = period::all();
        array_push($buttons,$button);
        return view('Administration/Teachers/formulario',compact('buttons','Cursos','Grados','Niveles','Jornadas'));
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
        $C= $data['Curso'];
        $G= $data['Grado'];
        $N= $data['Nivel'];
        $J= $data['Jornada'];
        $NG = Assign_level_grade::where('Level_id',$N)->where('Grade_id',$G)->first();
        $JNG = Assign_period_grade::where('grade_level_id',$NG->id)->where('Period_id',$J)->first();
        $CJNG = Assign_course_grade::where('Course_id',$C)->where('Grade_id',$JNG->id)->first();
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
                //Tabla asignacion usuario a un rol
                $usuario_rol = new Assign_user_rol;
                $usuario_rol->rol_id = 3;
                $usuario_rol->user_id = $user->id;
                $usuario_rol->State = "Active";
                $usuario_rol->save();
                #Tabla logs
                $usuario_curso = new Asign_teacher_course;
                $usuario_curso->user_id = $user->id;
                $usuario_curso->Course_id = $CJNG->id;
                $usuario_curso->save();
                $log = new logs;
                $log->Table = "Voluntario";
                $log->User_ID = $id;
                $log->Description = "Se creo nuevo voluntario con el id: ".$person->id;
                $log->Type = "Create";
                $log->save();
                $log = new logs;
                $log->Table = "Voluntario";
                $log->User_ID = $id;
                $log->Description = "Se creo nuevo usuario con nombre: ".$user->name." y correo: ".$user->email;
                $log->Type = "Create";
                $log->save();
                $log = new logs;
                $log->Table = "Voluntario";
                $log->User_ID = $id;
                $log->Description = "ID: ".$usuario_rol->id." de la Asignacion de rol voluntario al usuario: ".$user->id;
                $log->Type = "Create";
                $log->save();
                $log = new logs;
                $log->Table = "Voluntario";
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

    public function edit($id)
    {
        $buttons =[];
        $button = [
            "Name" => 'Listado Voluntarios',
            "Link" => 'administration/teacher/list',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $ModelsP = Person::find($id);
        $User = User::where('Person_id',$id)->first();
        $ModelsU = [
                'Usuario' => $User->name,
                'Email' => $User->email,
            ];
        return view('Administration/Teachers/updateForm',compact('ModelsP','ModelsU','buttons'));
    }

    public function update(Request $request)
    {
        $id = $request->session()->get('User_id');
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
        );
        User::where('Person_id', $PersonaID)->update($dataU);
        //LOGICA Persona
        $dataP=array(
            'Names' => $Nombres,
            'LastNames' => $Apellidos,
            'Address' => $Direccion,
            'Phone' => $Telefono,
            'BirthDate' =>$FechaNacimiento,
        );
        Person::where('id',$PersonaID)->update($dataP);
        $log = new logs;
        $log->Table = "people y users";
        $log->User_ID = $id;
        $log->Description = "Se actualizaron los datos de una persona con el id: ".$PersonaID." y correo ".$Email;
        $log->Type = "Update";
        $log->save();
        return response()->json(["Accion completada"]);
    }

    public function delete($id, Request $request)
    {
        $IID = $request->session()->get('User_id');
        $usuarioLogueado = User::find($IID);
        $r = User::find($id);
        $dataU=array(
            'State' => 'Desactivated',
        );
        $log = new logs;
        $log->Table = "Voluntario";
        $log->User_ID = $usuarioLogueado->name;
        $log->Description = "Se desactivo un usuario con el nombre: ".$r->name." y el correo: ".$r->email;
        $log->Type = "Delete";
        $log->save();
        User::where('Person_id', $id)->update($dataU);
        Assign_user_rol::where('user_id',$id)->update($dataU);
        return redirect()->route('ListTeacher');
    }
    public function formScore()
    {
        $buttons =[];
        $button = [
            "Name" => 'Listado Voluntarios',
            "Link" => 'administration/teacher/list',
            "Type" => "add"
        ];
        $cursos = course::all();
        $grados = grade::all();
        $niveles = level::all();
        $jornadas = period::all();
        array_push($buttons,$button);
        return view('Administration/Teachers/formScores',compact('buttons','cursos','niveles','grados','jornadas'));
    }
    public function score()
    {
        $buttons =[];
        $button = [
            "Name" => 'Añadir un voluntario',
            "Link" => 'administration/home/dashboard',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $curso = course::find(1);
        $grado = grade::find(3);
        $jornada = period::find(1);
        // // $data = $request->data[0];
        // $curso = course::find($data['Curso']);
        // $grado = grade::find($data['Grado']);
        // $nivel = course::find($data['Nivel']);
        // $jornada = course::find($data['Jornada']);
        // $NG = Assign_level_grade::where('Level_id',$curso->id)->where('Grade_id',$grado->id)->first();
        // $JNG = Assign_period_grade::where('grade_level_id',$NG->id)->where('Period_id',$jornada->id)->first();
        // // $CJNG = Assign_course_grade::where('Course_id',$curso->id)->where('Grade_id',$JNG->id)->first();
        // $AsignacionEstudiante = Assign_student_grade::where('Grade_id',$JNG->id)->first();
        // $estudiantes = [];
        // foreach ($AsignacionEstudiante as $value) {
        //     $e = student::find($value->user_id);
        //     $data = [
        //         'Nombre' => $e->Names,
        //         'Apellidos' =>$e->LastNames,
        //     ];
        //     array_push($estudiantes, $data);
        // }
        $Titles = ['Id','Alumno','Voluntario','Curso','P1','P2','P3','P4','Acciones'];
        return view('Administration/Teachers/listadoNotas',compact('buttons','Titles','curso','grado','jornada'));
    }
    public function llenaN(Request $request)
    {
        $jornada = Input::get('ciudad_id');
        $jornadaN = Assign_period_grade::where('Period_id',$jornada)->get();
        $niveles = [];
        $grados = [];
        foreach ($jornadaN as $value) {
            $gradelevel = Assign_level_grade::find($value->grade_level_id);
            $nivel = level::find($gradelevel->level_id);
            // for ($i=0; $i < $niveles.length() ; $i++) { 
                // if($niveles[i] != $nivel->Name){
            $dataN = [
                'id' => $nivel->id,
                'Nivel' => $nivel->Name
            ];
            array_push($niveles, $nivel);
                // }
            // }
        }
        return response()->json($niveles);
    }
    //Ingreso de notas
    public function Edit_Note()
    {
        
    }
    public function Save_Note()
    {
        
    }
	//publicacion de informacion
    public function Create_Information()
    {
    }
    public function Create_Assistance()
    {
    }
    public function Create_Reports()
    {
    }

	public function Store_Information()
    {
    }

    public function Show_Information()
    {
    }

    public function Edit_Information()
    {
    }

    public function Update_Information()
    {
    }

	public function Store_Note()
    {
    }

    public function Show_Note()
    {
    }

    //planificacion de evaluaciones
    public function Create_Test()
    {
    }

	public function Store_Test()
    {
    }

    public function Show_Test()
    {
    }

    public function Edit_Test()
    {
    }

    public function Update_Test()
    {
    }

    //preguntas de examen
    public function Create_Question()
    {
    }

	public function Store_Question()
    {
    }

    public function Show_Question()
    {
    }

    public function Edit_Question()
    {
    }

    public function Update_Question()
    {
    }

    //asignar de preguntas a examen
    public function Create_Assign_question_test()
    {
    }

	public function Store_Assign_question_test()
    {
    }

    public function Show_Assign_question_test()
    {
    }

    public function Edit_Assign_question_test()
    {
    }

    public function Update_Assign_question_test()
    {
    }

    //asignacion de examen a curso
    public function Create_Assign_test_course()
    {
    }

	public function Store_Assign_test_course()
    {
    }

    public function Show_Assign_test_course()
    {
    }

    public function Edit_Assign_test_course()
    {
    }

    public function Update_Assign_test_course()
    {
    }
}

