<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('menus')->insert([
            'Name' => 'Inicio',
            'Icon' => 'pe-7s-home',
           	'State' => '1',     
            'Order' => '1',  
            'Url' => 'administration/home',      
        ]);
        DB::table('menus')->insert([
            'Name' => 'Dashboard',
            'State' => '1',
            'Url' => 'administration/home/dashboard',  
            'menu_id' => '1'          
        ]);
         DB::table('menus')->insert([
            'Name' => 'Notas',
            'State' => '1',
            'Url' => 'administration/home/dashboard',  
            'menu_id' => '1'          
        ]);
          DB::table('menus')->insert([
            'Name' => 'Estudiantes', //4
            'Icon' => 'pe-7s-home',
            'Url' => 'administration/estudiantes',
            'State' => '1',     
            'Order' => '2',      
        ]);
           DB::table('menus')->insert([
            'Name' => 'Listado estudiantes',
            'State' => '1',
            'Url' => 'administration/estudiantes/Listado',  
            'menu_id' => '4'          
        ]);
            DB::table('menus')->insert([ //6
            'Name' => 'Voluntarios',
            'Icon' => 'pe-7s-home',
            'Url' => 'administration/voluntarios',
            'State' => '1',     
            'Order' => '3',      
        ]);
             DB::table('menus')->insert([
            'Name' => 'Listado voluntarios',
            'State' => '1',
            'Url' => 'administration/voluntarios/listado',  
            'menu_id' => '6'          
        ]);
            DB::table('menus')->insert([
            'Name' => 'Ingreso voluntarios',
            'State' => '1',
            'Url' => 'administration/registrar',  
            'menu_id' => '6'          
        ]);

        //ROL VOLUNTARIO
        DB::table('menus')->insert([ //9
            'Name' => 'Grados',
            'Icon' => 'pe-7s-home',
            'Url' => 'administration/voluntarios',
            'State' => '1',     
            'Order' => '3',      
        ]);
        DB::table('menus')->insert([ //10
            'Name' => 'Reportes',
            'Icon' => 'pe-7s-home',
            'Url' => 'administration/voluntarios',
            'State' => '1',     
            'Order' => '4',      
        ]);
        DB::table('menus')->insert([
            'Name' => 'Detalles Estudiantes',
            'State' => '1',
            'Url' => 'administration/voluntarios/ListadoEstudiantes',  
            'menu_id' => '4'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Asistencia Estudiantes',
            'State' => '1',
            'Url' => 'administration/voluntarios/asistenciaEstudiantes',  
            'menu_id' => '10'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Asistencia de Estudiantes al examen',
            'State' => '1',
            'Url' => 'administration/voluntarios/asistenciaExamen',  
            'menu_id' => '10'          
        ]);
       
    }
}
