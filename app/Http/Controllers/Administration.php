<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
//Modelo de usuarios
use App\Models\User;
//Modelo de personas para usuarios
use App\Models\Person;
//modelo de Menu
use App\Models\menu;
//modelo de Rol
use App\Models\rol;
// modelo de permisos para los menus
use App\Models\permission;
//modelo de jornadas 
use App\Models\period;
//modelo de niveles de grados
use App\Models\level;
//modelo de niveles de grados
use App\Models\logs;
//modelo de grado
use App\Models\grade;
//modelo de jornadas
use App\Models\periods;
//Modelo de aula
use App\Models\classrom;
//modelo de materias
use App\Models\course;
//modelo de periodos para los cursos
use App\Models\schedule;
//Modelo Asignacion roles a usuario
use App\Models\Assign_user_rol;
//Modelo Asignacion roles a usuario
use App\Models\Assign_student_grade;
//Modelo Asignacion Jornada grado
use App\Models\Assign_period_grade;
//Modelo Asignacion nivel grado
use App\Models\Assign_level_grade;
use Illuminate\Support\Facades\DB;

class Administration extends Controller
{
    //Dashboard
    public function Dashboard()
    {
        $buttons =[];
        $button = [
            "Name" => 'Añadir un estudiante',
            "Link" => 'administration/home/dashboard',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        return view('Administration.Dashboard.Vacio',compact('buttons'));
    }

    public function Crear_Clientes()
    {
        return view('Administration.Clientes.Crear_Clientes');
    }
    
    public function Guardar_clientes(Request $request)
    {
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        $Apellidos= $data['Apellido'];
        //LOGICA
        $person = new Person;
        $person->Names = $Nombres;
        $person->LastNames = $Apellidos;
        $person->save();
        $logs = new Log;
        $logs->Table = "Clientes";
        $logs->User_Id = $request->session()->get('User_Id');
        $logs->Description = "Se guardo cliente ID = ".$person->id." Nombre = ".$person->LastNames;
        $logs->save();
        return response()->json(["Accion completada"]);
    }
    
    public function View_Clients()
    {
        $Titles =['Id','Nombre','Apellido','Grado','Acciones'];
        $Models = [];
        $model = user::all();
        foreach ($model as $value) {
            $person = Person::where('id',$value->Person_id)->first();
            $data = [
                'Id' => $value->id,
                'Name' => $person->Names,
                'Apellido' => $person->LastNames,
                'Grado' => '4to Primaria',
            ];
            array_push($Models,$data);
        }
        return view('Administration.Clientes.Listado_Clientes',compact('Titles','Models'));
    }
    
    //Funciones de crear    
    public function Create_Menu()
    {
        return view('Administration.Menu.Crear_Menu');
    }
    
    public function Store_Menu(Request $request)
    {
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        //LOGICA
        $menus = new Menu;
        $menus->Name = $Nombres;
        $menus->save();
        $logs = new Log;
        $logs->Table = "Menus";
        $logs->User_Id = $request->session()->get('User_Id');
        $logs->Description = "Se guardo menu ID =".$menus->id." Nombre =".$menus->Name;
        $logs->save();
        return response()->json(["Accion completada"]);
    }

    public function Create_Rol()
    {
        return view('Administration.Rol.Crear_Rol');        
    }
    
    public function Store_Rol(Request $request)
    {
        $data = $request->data[0];
        $Nombres= $data['Nombre'];
        //LOGICA
        $rols = new Rol;
        $rols->Name = $Nombres;
        $rols->save();
        $logs = new Log;
        $logs->Table = "Menus";
        $logs->User_Id = $request->session()->get('User_Id');
        $logs->Description = "Se guardo rol ID = ".$rols->id." Nombre = ".$rols->Name;
        $logs->save();
        return response()->json(["Accion completada"]);
    }
    
    public function Save_Person(Request $request)
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
        //LOGICA
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

    public function Create_permission()
    {
        return view('Administration/Permisos/formulario');
    }
    public function LevelList()
    {
        $buttons =[];
        $button = [
            "Name" => 'Añadir una jornada',
            "Link" => 'administration/home/dashboard',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver listado de niveles y grados',
            "Link" => 'administration/home/dashboard',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver listado de grados',
            "Link" => 'administration/home/dashboard',
            "Type" => "btn2"
        ];
        array_push($buttons,$button);

        $Titles =['Id','Jornada','Niveles','No de Grados','Acciones'];
        $Models = [];
        $model = periods::where("State","Active")->get();
        foreach ($model as $value) {
            $val=[
                "Jornada" => $value->Name,
            ];
        }
        return view('Administration.Grades.Level_List',compact('Titles','Models','buttons'));
    }
    public function Save_Permission(Request $request)
    {
        $data = $request->data[0];
        $Nombre= $data['Nombre'];
        $Slug= $data['Slug'];
        //LOGICA
        $permission = new permission;
        $permission->Name = $Nombre;
        $permission->Slug = $Slug;
        $permission->save();
        $permission->save();
        $logs = new Log;
        $logs->Table = "Permisos";
        $logs->User_Id = $request->session()->get('User_Id');
        $logs->Description = "Se guardo permiso ID = ".$permission->id." Nombre = ".$permission->Name;
        $logs->save();
        return response()->json(["Accion completada"]);
    }
    
    public function Create_schedule()
    {
        return view('Administration/Horarios/formulario');
    }
    
    public function Save_Schedule(Request $request)
    {
        $data = $request->data[0];
        $HI = $data['HoraInicio'];
        $HF = $data['HoraFinal'];
        $Dia = $data['Dia'];
        $Tipo = $data['Tipo'];
        $horario = new schedule;
        $horario->StartHour = $HI;
        $horario->EndHour = $HF;
        $horario->Day = $Dia;
        $horario->Type = $Tipo;
        $horario->save();
        $logs = new Log;
        $logs->Table = "Horarios";
        $logs->User_Id = $request->session()->get('User_Id');
        $logs->Description = "Se guardo horario ID = ".$horario->id." Dia = ".$horario->Day;
        $logs->save();
        return response()->json(["Accion completada"]);
    }
    
    public function Create_grade()
    {
    }
    public function Create_courses()
    {
    }

    //Funciones para visualizacion de datos
    //Visualizacion tabla personas con usuario
    public function View_User_Person()
    {
        $Titles = ['Id','Nombres','Apellidos','Direccion','Telefono','Fecha Nacimiento','Usuario','Email','Acciones'];
        $usuarios = User::all();
        $Models = [];
        foreach ($usuarios as $value) {
            $persona = Person::where('id',$value->Person_id)->first();
            $data = [
                'Id' => $persona->id,
                'Name' => $persona->Names,
                'Apellido' => $persona->LastNames,
                'Direccion' => $persona->Address,
                'Telefono' => $persona->Phone,
                'Fecha_Nacimiento' => $persona->BirthDate,
                'Usuario' => $value->name,
                'Correo' => $value->email,
            ];
            array_push($Models,$data);
        }
        return view('Administration.Personas.ListadoPersonas',compact('Models','Titles'));
    }

    public function View_Menu()
    {
        $menus = menu::all();
        return view('Administration.Menu.ListadoMenus',compact('menus'));
    }

    public function View_User_teacher() //Visualizcion tabla Estudiantes con usuario
    {
        $Titles =['Id','Nombres','Apellidos','Direccion','Telefono','Fecha Nacimiento','Usuario','Email', 'Acciones'];
        $usuario_rol = Assign_user_rol::where('Rol_id',3)->get('user_id');
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
        return view('Administration/Voluntarios/ListadoVoluntarios',compact('Models','Titles'));
    }
    
    public function View_User_Student() //Visualizcion tabla Estudiantes con usuario
    {
        $Titles =['Id','Nombres','Apellidos','Direccion','Telefono','Fecha Nacimiento','Usuario','Email', 'Acciones'];
        $usuario_rolEstudiante = Assign_user_rol::where('Rol_id',2)->get('user_id');
        $Models = [];
        foreach ($usuario_rolEstudiante as $v) {
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
        return view('Administration/Estudiantes/ListadoEstudiantes',compact('Models','Titles'));
    }

    public function View_Student_Assignment()
    {
        $Titles = ['ID Asignacion','Nombres','Apellido','Direccion','Telefono','Fecha Nacimiento','Grado'];
        $asignaciones = Assign_student_grade::all();
        $Models = [];
        foreach ($asignaciones as $value) {
            $usuario = User::where('id',$value->user_id)->first(); //Obtencion usuario de aignacion estudiante/grado
            $estudiante = Person::where('Person_id',$usuario->Person_id)->first(); //obtencion del estudiante de usuario
            $jornadaGrado = Assign_period_grade::where('id',$value->Grade_id)->first(); //obtencion jornada/grado de asignacion estudiante/grado
            $nivelGrado = Assign_level_grade::where('id',$jornadaGrado->grade_level_id)->first();
            $grado = grade::where('id',$nivelGrado->Grade_id)->first();
            $data = [
                'Id' => $value->id,
                'Name' => $estudiante->Names,
                'Apellido' => $estudiante->LastNames,
                'Direccion' => $estudiante->Address,
                'Telefono' => $estudiante->Phone,
                'Fecha_Nacimiento' => $estudiante->BirthDate,
                'Grado' => $grado->Name,
            ];
            array_push($Models,$data);
        }
        return view('Administration/Estudiantes/ListadoAsignacionEstudiante',compact('Models','Titles'));
    }

    public function View_Rol()
    {
        $rols = rol::all();
        return view('Administration.Rol.ListadoRoles',compact('rols'));       
    }
    
    public function View_Permission()
    {
        $Titles = ['ID','Nombre Permiso', 'Slug'];
        $permisos = permission::all();
        return view('Administration/Permisos/ListadoPermisos',compact('permisos','Titles'));
    }
    
    public function View_Course()
    {
        $courses = course::all();
        return view('Administration.Curso.ListadoCursos',compact('courses'));
    }
    
    public function View_Grade()
    {
        $grades = grade::all();
        return view('Administration.Grado.ListadoGrados',compact('grades'));
    }
    
    public function View_Level()
    {
        $levels = level::all();
        $Titles =['Id','Nombre','Apellido','Grado','Acciones'];
        $Models = [];
        return view('Administration.Nivel.ListadoNiveles',compact('levels'));
    }
    
    public function View_Classroom()
    {
        $classrooms = classroom::all();
        return view('Administration.Clase.ListadoClases',compact('classrooms'));
    }
    
    public function View_Schedule()
    {
        $Titles = ['ID','Hora Inicio', 'Hora Final', 'Dia', 'Tipo'];
        $Models = schedule::all();
        return view('Administration/Horarios/Horarios',compact('Models','Titles'));
    }
    
    public function Edit_Teacher($id)
    {
        $ModelsP = Person::find($id);
        $User = User::where('Person_id',$id)->first();
        $ModelsU = [
                'Usuario' => $User->name,
                'Email' => $User->email,
            ];
        return view('Administration/Voluntarios/formEdit',compact('ModelsP','ModelsU'));
    }
    
    public function Edit_Person($id)
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
    public function Update_Person($id, Request $request)
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
   
    public function Edit_Permission($id)
    {
        $Model = permission::find($id);
        return view('Administration/Permisos/formEdit',compact('Model'));
    }
    
    public function Update_Permission($id, Request $request)
    {
        $data = $request->data[0];
        $Nombre= $data['Permiso'];
        $Slug= $data['Slug'];
        //LOGICA
        $dataP=array(
            'Name' => $Nombre,
            'Slug' => $Slug,
        );
        permission::where('id',$id)->update($dataP);
        return response()->json(["Accion completada"]);
    }
    
    public function Edit_Schedule($id)
    {
        $Model = schedule::find($id);
        return view('Administration/Horarios/formEdit',compact('Model'));
    }
    
    public function Update_Schedule($id, Request $request)
    {
        $data = $request->data[0];
        $HI = $data['HoraInicio'];
        $HF = $data['HoraFinal'];
        $Dia = $data['Dia'];
        $Tipo = $data['Tipo'];
        $dataH=array(
            'StartHour' => $HI,
            'EndHour' => $HF,
            'Day' => $Dia,
            'Type' => $Tipo,
        );
        schedule::where('id',$id)->update($dataH);
        $logs = new Log;
        $logs->Table = "Horarios";
        $logs->User_Id = $request->session()->get('User_Id');
        $logs->Description = "Se guardo horario ID = ".$horario->id." Dia = ".$horario->Day;
        $logs->save();
        return response()->json(["Accion completada"]);
    }
    
    public function Update_menu()
    {
    }
    
    public function Update_grade()
    {
    }

    public function Update_courses()
    {
    }
}
