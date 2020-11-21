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
    public function Dashboard(Request $request)
    {
        $rol = $request->session()->get('rol_Name');
        if($rol=="Estudiante")
        {
            return redirect('student/home/dashboard');
        }
        elseif($rol=="Voluntario")
        {
            return redirect('teacher/home/dashboard');
        }
        $buttons =[];
        $button = [
            "Name" => 'Añadir un estudiante',
            "Link" => 'administration/home/dashboard',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        return view('Administration.Dashboard.Home',compact('buttons'));
    }
    public function AttendantList(Request $request)
    {
        $buttons =[];
        $button = [
            "Name" => 'Añadir un estudiante',
            "Link" => 'administration/home/dashboard',
            "Type" => "add"
        ];
        array_push($buttons,$button);
        return view('Administration.Attendant.List',compact('buttons'));
    }
    public function test($test)
    {
        return view('Administration.Tests.'.$test);
    }
    public function GradesPeriod(Request $request)
    {
        $data = $request->data[0];
        foreach ($data['Grades'] as $Grade) {
            $NewGrade = new Grade;
            $NewGrade->Name = $Grade;
            $NewGrade->Level_id =$data['Level'];
            $NewGrade->State = "Active";
            $NewGrade->save();
        }
        return response()->json(["Accion completada"]);
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
    
    

    public function Create_permission()
    {
        return view('Administration/Permisos/formulario');
    }
    public function LoadGrades(Request $request)
    {   
        $ModelsData = level::find($request['LvlId']);
        $Models =[];
        foreach ($ModelsData->Grades()  as $value) {
            $model = [
                "Id" =>$value->id,
                "Name" =>$value->Name." ".$value->Section,
            ];
            array_push($Models,$model);
         } 
        return response()->json([
            "Grades" => $Models,
            ]);
    }
    public function LoadLevels(Request $request)
    {   
        $ModelsData = period::find($request['PeriodId']);
        $Models =[];
        foreach ($ModelsData->Levels()  as $value) {
            $model = [
                "Id" =>$value->id,
                "Name" =>$value->Name,
            ];
            array_push($Models,$model);
         } 
        return response()->json([
            "Levels" => $Models,
            ]);
    }
    public function LoadPeriods()
    {
        $PeriodsData = period::where('State','Active')->get();
        $periods =[];
       
        foreach ($PeriodsData as $value) {
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
    public function LoadCourses(Request $request)
    {
        $CoursesData = course::where('Grade_id',$request['GradeId'])->get();
        $courses =[];
        foreach ($CoursesData as $value) {
            $course = [
                "Id" =>$value->id,
                "Name" =>$value->Name,
            ];
            array_push($courses,$course);
         } 
        return response()->json([
            "Courses" => $courses,
            ]);
    }
    public function LevelList()
    {
        $buttons =[];
        $button = [
            "Name" => 'Añadir un circulo de estudio',
            "Link" => 'create()',
            "Type" => "addFunction"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver grados de un circulo de estudio',
            "Link" => 'administration/home/dashboard',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver circulos de estudio eliminados',
            "Link" => 'administration/configurations/level/list/deletes',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $Titles =['Id','Circulo de estudio','Niveles','No de Grados','Acciones'];
        $Models = [];
        $model = period::where("State","Active")->get();
        foreach ($model as $value) {
            $levels = "";
            $idLvl = "";
            foreach ($value->Levels() as $key => $value2) {
                if($levels!="")
                $levels = $levels.", ".$value2->Name;
                else
                $levels =$value2->Name;
                if($idLvl!="")
                $idLvl = $idLvl.", ".$value2->id;
                else
                $idLvl =$value2->id;
            }
            $m =[
                "Id" => $value->id,  
                "Jornada" => $value->Name,  
                "idLvl" =>$idLvl,
                "Niveles" => $levels,
                "Grados" => count($value->Grades())
            ];
            array_push($Models,$m);
        }
        $type="Active";
        return view('Administration.Grades.Level_List',compact('Titles','Models','buttons','type'));
    }
    public function ViewGradesLvl($id)
    {
        $buttons =[];
        $button = [
            "Name" => 'Añadir un grado',
            "Link" => 'create()',
            "Type" => "addFunction"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver grados eliminados',
            "Link" => 'administration/home/dashboard',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver cursos eliminados',
            "Link" => 'administration/configurations/level/list/deletes',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver log de grados y cursos',
            "Link" => 'administration/configurations/level/list/deletes',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $Titles =['Id','Grado','Sección','Nivel','Cursos','No. de Voluntarios','Acciones'];
        $lvl = level::find($id); 
        $level = $lvl->Name;
        $period = $lvl->Period()->Name;
        $Models = [];
        foreach ($lvl->Grades() as $key => $value) {
            $m =[
                "Id" => $value->id,  
                "Grade" => $value->Name,  
                "Section" => $value->Section,  
                "Lvl" => $lvl->Name,
                "Curses" => $value->CoursesList(),
                "NoTeachers" => "0"
            ];
            array_push($Models,$m);
        }
        return view('Administration.Grades.List',compact('Titles','Models', 'level','period','buttons'));
    }
    public function SaveCourses(Request $request)
    {
        $courses =$request->data;
        $grade =$request->Id;
        foreach($courses as $Course)
        {
            
            $course = new course;
            $course->Name =  $Course;
            $course->Grade_id =$grade;
            $course->State = "Active";
            $course->save();
        }
        
        return response()->json(["Accion completada"]);
    }
    public function LevelListDelete()
    {
        $buttons =[];

        $button = [
            "Name" => 'Ver grados de una jornada',
            "Link" => 'administration/home/dashboard',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);
        $button = [
            "Name" => 'Ver jornadas activas',
            "Link" => 'administration/configurations/level/list',
            "Type" => "btn1"
        ];
        array_push($buttons,$button);

        $Titles =['Id','Dia','Niveles','No de Grados','Acciones'];
        $Models = [];
        $model = period::where("State","Delete")->get();
       
    
        foreach ($model as $value) {
            $levels = "";
            $idLvl = "";
            foreach ($value->Levels() as $key => $value2) {
                if($levels!="")
                $levels = $levels.", ".$value2->Name;
                else
                $levels =$value2->Name;
                if($idLvl!="")
                $idLvl = $idLvl.", ".$value2->id;
                else
                $idLvl =$value2->id;
            }
           
            $m =[
                "Id" => $value->id,  
                "Jornada" => $value->Name,  
                "idLvl" =>$idLvl,
                "Niveles" => $levels,
                "Grados" => count($value->Grades())
            ];
            array_push($Models,$m);
        }
        $type="Delete";
        return view('Administration.Grades.Level_List',compact('Titles','Models','buttons','type'));
    }
    public function addGrade(Request $request)
    {
        
        $Grade = new Grade;
        $data = $request->data[0];
        $Grade->Name = $data['Name'];
        $Grade->State = "Section";
        $Grade->State = "Active";
        $Grade->Level_id =  $data['id'];
        $Grade->save();
        return response()->json(["Accion completada"]);
    }
    public function LevelSave(Request $request)
    {
        $level = new level;
        $data = $request->data[0];
        $level->Name = $data['Name'];
        $level->State = "Active";
        $level->Period_id =  $data['id'];
        $level->save();
        return response()->json(["Accion completada"]);
    }
    public function PeriodSave(Request $request)
    {
        $period = new period;
        $data = $request->data[0];
        $period->Name = $data['Name'];
        $period->State = "Active";
        $period->save();
        return response()->json(["Accion completada"]);
    }
    public function PeriodUpdate(Request $request)
    {
        $data = $request->data[0];
        $period = period::find($data['Code']);
        $period->Name = $data['Name'];
        $period->State = "Active";
        $period->save();
        return response()->json(["Accion completada"]);
    }
    public function ChangePeriod(Request $request,$id,$type)
    {
        if($type=="delete")
        {
            $period = period::find($id);
            $period->State= "Delete";
            $period->save();
        }
        if($type=="active")
        {
            $period = period::find($id);
            $period->State= "Active";
            $period->save();
        }
        return redirect()->route('LevelList');
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

    

    public function View_Menu()
    {
        $menus = menu::all();
        return view('Administration.Menu.ListadoMenus',compact('menus'));
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
