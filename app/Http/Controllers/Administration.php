<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Modelo de usuarios
use App\Models\User;
//Modelo de personas para usuarios
use App\Models\Person;
//modelo de Menu
use App\Models\menu;
// modelo de permisos para los menus
use App\Models\permission;
//modelo de jornadas 
use App\Models\period;
//modelo de niveles de grados
use App\Models\level;
//modelo de grado
use App\Models\grade;
//Modelo de aula
use App\Models\classrom;
//modelo de materias
use App\Models\course;
//modelo de periodos para los cursos
use App\Models\schedule;

class Administration extends Controller
{
    //Dashboard
    public function Dashboard()
    {
        return view('Administration.Dashboard.Vacio');
    }
    public function View_Clients()
    {
        $Titles =['Id','Nombre','Apellido','Pais','Pais','Pais','Pais','Pais','Pais','Pais','Acciones'];
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

        return view('Administration.Clientes.ListadoClientes',compact('Titles','Models'));
    }
    
	//Funciones de crear
    public function Create_User_Person(Request $request)
    {
        $usuario = new User;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->contraseña);
        $usuario->Person_id = $request->persona;
        $usuario->save();
        return redirect()->action([Administration::class,'View_User_Person']);
    }

    public function Create_menu()
    {
    	
    }
    public function Create_permission()
    {
    	
    }
    public function Create_grade()
    {
    	
    }
    public function Create_courses()
    {
    	
    }
    public function Create_schedule()
    {
    	
    }

    //Funciones para visualizacion de datos
    public function View_User_Person()
    {
        $personas = Person::all();
        $usuarios = User::all();
        return view('Pruebas/formulario',[
            'usuarios'=>$usuarios,
            'personas'=>$personas,
        ]);
    }
    public function View_menu()
    {
    	
    }
    public function View_permission()
    {
    	
    }
    public function View_grade()
    {
    	
    }
    public function View_courses()
    {
    	
    }
    public function View_schedule()
    {
    	
    }

    //Funcion edicion
    public function Edit_User_Person(User $usuario)
    {
        return view('Pruebas/editarU',compact('usuario'));
    }
    //Funciones de Actualizar
    public function Update_User_Person($id, Request $request)
    {
        $data=array(
            'name' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->contraseña),
            'Person_id' => $request->persona,
        );
        User::where('id', $id)->update($data);
        return redirect()->action([Administration::class,'View_User_Person']);
    }
    public function Update_menu()
    {
        
    }
    public function Update_permission()
    {
        
    }
    public function Update_grade()
    {
        
    }
    public function Update_courses()
    {
        
    }
    public function Update_schedule()
    {
        
    }
}
