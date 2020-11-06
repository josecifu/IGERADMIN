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
        //Administracion
      
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
            'Name' => 'Reportes generales',
            'State' => '1',
            'Url' => 'administration/home/report',  
            'menu_id' => '1'          
        ]);
          DB::table('menus')->insert([
            'Name' => 'Estudiantes', //4
            'Icon' => 'pe-7s-home',
            'Url' => 'administration/student',
            'State' => '1',     
            'Order' => '2',      
        ]);
           DB::table('menus')->insert([
            'Name' => 'Listado estudiantes',
            'State' => '1',
            'Url' => 'administration/student/list',  
            'menu_id' => '4'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Listado por grados',
            'State' => '1',
            'Type' => 'Link',
            'Url' => 'ListGrade()',  
            'menu_id' => '4'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Visualización de notas',
            'State' => '1',
            'Type' => 'Link',
            'Url' => 'ListScore()',  
            'menu_id' => '4'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Visualización de examenes',
            'State' => '1',
            'Type' => 'Link',
            'Url' => 'ListTest()',  
            'menu_id' => '4'          
        ]);
        DB::table('menus')->insert([//9
            'Name' => 'Estadisticas generales',
            'State' => '1',
            'Url' => 'administration/students/statistics',  
            'menu_id' => '4'          
        ]);
            DB::table('menus')->insert([ //10
            'Name' => 'Voluntarios',
            'Icon' => 'pe-7s-home',
            'Url' => 'administration/teacher',
            'State' => '1',     
            'Order' => '3',      
        ]);
             DB::table('menus')->insert([
            'Name' => 'Listado voluntarios',
            'State' => '1',
            'Url' => 'administration/teacher/list',  
            'menu_id' => '10'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Visualización de espacio de trabajo',
            'State' => '1',
            'Url' => 'administration/teacher/workspace',  
            'menu_id' => '10'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Visualización de notas',
            'State' => '1',
            'Url' => 'administration/teacher/score',  
            'menu_id' => '10'          
        ]);
        DB::table('menus')->insert([ //14
            'Name' => 'Estadisticas generales',
            'State' => '1',
            'Url' => 'administration/teacher/statistics',  
            'menu_id' => '10'          
        ]);       
        DB::table('menus')->insert([
            'Name' => 'Administracion', //15
            'Icon' => 'pe-7s-home',
            'Url' => 'administration/workspace',
            'State' => '1',     
            'Order' => '4',      
        ]);
        DB::table('menus')->insert([ 
            'Name' => 'Ver listado de encargados de circulo',
            'State' => '1',
            'Url' => 'administration/workspace/list',  
            'menu_id' => '15'          
        ]);  
        DB::table('menus')->insert([ 
            'Name' => 'Ver inscripciones',
            'State' => '1',
            'Url' => 'administration/workspace/inscriptions',  
            'menu_id' => '15'          
        ]);  
        DB::table('menus')->insert([ 
            'Name' => 'Ver espacios de trabajo',
            'State' => '1',
            'Url' => 'administration/workspace/list',  
            'menu_id' => '15'          
        ]);  
        DB::table('menus')->insert([ //19
            'Name' => 'Ver estadisticas de trabajo',
            'State' => '1',
            'Url' => 'administration/workspace/statistics',  
            'menu_id' => '15'          
        ]);  
        DB::table('menus')->insert([
            'Name' => 'Configuracion', //20
            'Icon' => 'pe-7s-home',
            'Url' => 'administration/configurations',
            'State' => '1',     
            'Order' => '4',      
        ]);
        DB::table('menus')->insert([ 
            'Name' => 'Ver listado de asignacion de jornadas y niveles',
            'State' => '1',
            'Url' => 'administration/configurations/level/list',  
            'menu_id' => '20'          
        ]); 
        DB::table('menus')->insert([ 
            'Name' => 'Ver horarios',
            'State' => '1',
            'Url' => 'administration/configurations/schedule/list',  
            'menu_id' => '20'          
        ]); 
        DB::table('menus')->insert([ 
            'Name' => 'Configuraciones generales',
            'State' => '1',
            'Url' => 'administration/configurations/list/',  //23
            'menu_id' => '20'          
        ]); 
        
    }
}
