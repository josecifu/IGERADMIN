<?php

namespace App\Http\Controllers;
use App\Models\menu;
use App\Models\Assing_menu_rol;
use Illuminate\Http\Request;

class MenuController extends Controller
{
   public function index(){
        $models = menu::getMenu(true);
        $Buttons = [];
        return view('Administration.Menu.Show',compact('models'));
    }
    public function insertmenu(Request $request){
            $value = $_POST['result'];
            $id = $_POST['menuitem'];
            $menu = new menu;
            $menurol = new MenuRol;
            $menu->menu_id = $id;
            $menu->Name = $value[0];
            $menu->Url = $value[1];
            $menu->Order = $value[2];
            $menu->State = 1;
            $menu->save();
            $menurol->rol_id = 1;
            $menurol->menu_id = $menu->id;
            $menurol->save();
    }
    public function insertmenuParent(Request $request){
        $value = $_POST['menu'];
        $menu = new menu;
        $menurol = new Assing_menu_rol;
        $menu->Name = $value[0];
        $menu->Icon = $value[1];
        $menu->Order = $value[2];
        $menu->State = 1;
        $menu->save();
        $menurol->rol_id = 1;
        $menurol->menu_id = $menu->id;
        $menurol->save();
        return response()->json(["Accion completada"]);
    }
    public function UpdateMenu(Request $request){
        $action = $_POST['action'];
        if($action == "1")
        {
            $value = $_POST['menu'];
            $id = $_POST['menuitem'];
            $menu = menu::find($id);
            $menu->Name = $value[0];
            $menu->Icon = $value[1];
            $menu->Url = $value[2];
            $menu->Order =$value[3] ?? '1';
            $menu->save();
            return response()->json(["Accion completada"]);
        }
        else{
            if($action=="Inactive")
            {
                $id = $_POST['menuitem'];
                $menu = menu::find($id);
                $menu->State = 2;
                $menu->save();
                return response()->json(["Accion completada"]);
            }
            if($action=="Delete")
            {
                $id = $_POST['menuitem'];
                $menu = menu::find($id);
                $menu->State = 0;
                $menu->save();
                return response()->json(["Accion completada"]);
            }
            if($action=="Active")
            {
                $id = $_POST['menuitem'];
                $menu = menu::find($id);
                $menu->State = 1;
                $menu->save();
                return response()->json(["Accion completada"]);
            }
        }
        
    }
}
