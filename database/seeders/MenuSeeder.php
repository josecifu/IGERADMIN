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
            'Name' => 'Tablero',
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
            'Type' => '1',
            'Url' => 'ListGrade(1)',  
            'menu_id' => '4'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Visualización de notas',
            'State' => '1',
            'Type' => '2',
            'Url' => 'ListGrade(2)',  
            'menu_id' => '4'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Visualización de examenes',
            'State' => '1',
            'Type' => '3',
            'Url' => 'ListGrade(5)',  
            'menu_id' => '4'          
        ]);
        DB::table('menus')->insert([//9
            'Name' => 'Estadisticas generales',
            'State' => '1',
            'Url' => 'administration/student/statistics',  
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
            'Type' => '4',
            'Url' => 'ListGrade(3)', 
            'menu_id' => '10'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Visualización de examenes',
            'State' => '1',
            'Type' => '4',
            'Url' => 'ListGrade(4)',    
            'menu_id' => '10'          
        ]);
        DB::table('menus')->insert([ //15
            'Name' => 'Estadisticas generales',
            'State' => '1',
            'Url' => 'administration/teacher/statistics',  
            'menu_id' => '10'          
        ]);       
        DB::table('menus')->insert([
            'Name' => 'Administracion', //16
            'Icon' => 'pe-7s-home',
            'Url' => 'administration/workspace',
            'State' => '1',     
            'Order' => '4',      
        ]);
        DB::table('menus')->insert([ 
            'Name' => 'Ver listado de encargados de circulo',
            'State' => '1',
            'Url' => 'administration/workspace/attendant/list',  
            'menu_id' => '16'          
        ]);  
        DB::table('menus')->insert([ //18
            'Name' => 'Ver inscripciones',
            'State' => '1',
            'Url' => 'administration/workspace/inscriptions',  
            'menu_id' => '16'          
        ]);  
        DB::table('menus')->insert([ 
            'Name' => 'Ver espacios de trabajo',
            'State' => '1',
            'Url' => 'administration/workspace/list',  
            'menu_id' => '16'          
        ]);  
        DB::table('menus')->insert([ //20
            'Name' => 'Ver estadisticas de trabajo',
            'State' => '1',
            'Url' => 'administration/workspace/statistics',  
            'menu_id' => '16'          
        ]);  
        DB::table('menus')->insert([
            'Name' => 'Configuración', //21
            'Icon' => 'pe-7s-home',
            'Url' => 'administration/configurations',
            'State' => '1',     
            'Order' => '4',      
        ]);
        DB::table('menus')->insert([ 
            'Name' => 'Ver asignaciones de circulos de estudio, niveles y grados',
            'State' => '1',
            'Url' => 'administration/configurations/level/list',  
            'menu_id' => '21'          
        ]); 
        DB::table('menus')->insert([ 
            'Name' => 'Configuraciones generales',
            'State' => '1',
            'Url' => 'administration/configurations/list',  //23
            'menu_id' => '21'          
        ]); 


        //Students
        DB::table('menus')->insert([
            'Name' => 'Inicio', //21
            'Icon' => 'pe-7s-home',
            'Url' => 'student/home',
            'State' => '1',     
            'Order' => '4',      
        ]);
        DB::table('menus')->insert([ 
            'Name' => 'Tablero',
            'State' => '1',
            'Url' => 'student/home/dashboard',  //25
            'menu_id' => '24'          
        ]); 
        DB::table('menus')->insert([ 
            'Name' => 'Espacio de trabajo',
            'State' => '1',
            'Url' => 'student/home/workspace',  //26
            'menu_id' => '24'          
        ]); 
        DB::table('menus')->insert([
            'Name' => 'Notas', //27
            'Icon' => 'pe-7s-home',
            'Url' => 'student/score',
            'State' => '1',     
            'Order' => '4',      
        ]);
        DB::table('menus')->insert([ 
            'Name' => 'Visualizar notas',
            'State' => '1',
            'Url' => 'student/score/list',  //28
            'menu_id' => '27'          
        ]); 
        DB::table('menus')->insert([
            'Name' => 'Examenes', //29
            'Icon' => 'pe-7s-home',
            'Url' => 'student/test',
            'State' => '1',     
            'Order' => '4',      
        ]);
        DB::table('menus')->insert([ 
            'Name' => 'Visualizar examenes programados',
            'State' => '1',
            'Url' => 'student/test/view',  //30
            'menu_id' => '29'          
        ]); 
        DB::table('menus')->insert([ 
            'Name' => 'Visualizar todos los examenes',
            'State' => '1',
            'Url' => 'student/test/list',  //31
            'menu_id' => '29'          
        ]); 

            //Teachers
        DB::table('menus')->insert([
            'Name' => 'Inicio', //32
            'Icon' => 'pe-7s-home',
            'Url' => 'teacher/home',
            'State' => '1',     
            'Order' => '4',      
        ]);
        DB::table('menus')->insert([ 
            'Name' => 'Tablero',
            'State' => '1',
            'Url' => 'teacher/home/dashboard',  //33
            'menu_id' => '32'          
        ]); 
        DB::table('menus')->insert([ 
            'Name' => 'Espacio de trabajo',
            'State' => '1',
            // 'Url' => 'teacher/home/workspace',  //34
            'Type' => '3',
            'Url' => 'listCourse(4)',
            'menu_id' => '32'          
        ]); 
        DB::table('menus')->insert([
            'Name' => 'Notas', //35
            'Icon' => 'pe-7s-home',
            'Url' => 'teacher/score',
            'State' => '1',     
            'Order' => '4',      
        ]);
        DB::table('menus')->insert([ 
            'Name' => 'Visualizar notas',
            'State' => '1',
            // 'Url' => 'teacher/score/list/vol',  //36
            'Type' => '3',
            'Url' => 'listCourse(1)',       
            'menu_id' => '35'
        ]); 
        DB::table('menus')->insert([
            'Name' => 'Examenes', //37
            'Icon' => 'pe-7s-home',
            'Url' => 'teacher/test',
            'State' => '1',     
            'Order' => '4',      
        ]);
        DB::table('menus')->insert([ 
            'Name' => 'Visualizar examenes programados',
            'State' => '1',
            // 'Url' => 'teacher/test/view',  //38
            'Type' => '3',
            'Url' => 'listCourse(3)',
            'menu_id' => '37'          
        ]); 
        DB::table('menus')->insert([ 
            'Name' => 'Visualizar todos los examenes',
            'State' => '1',
            // 'Url' => 'teacher/test/list/vol',  //39
            'Type' => '3',
            'Url' => 'listCourse(2)',
            'menu_id' => '37'      
        ]); 
    }
}
