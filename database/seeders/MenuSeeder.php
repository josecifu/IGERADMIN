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
            'Function'=> 'ListGrade(1)',
            'Url' => 'administration/student/bygrade',  
            'menu_id' => '4'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Visualización de notas',
            'State' => '1',
            'Type' => '2',
            'Function'=> 'ListGrade(2)',
            'Url' => 'administration/student/score',  
            'menu_id' => '4'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Visualización de examenes',
            'State' => '1',
            'Type' => '3',
            'Function'=> 'ListGrade(5)',
            'Url' => 'administration/student/tests',   
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
            'Type' => '3',
            'Function'=> 'ListGrade(8)',
            'Url' => 'administration/teacher/workspace',   
            'menu_id' => '10'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Visualización de notas',
            'State' => '1',
            'Type' => '4',
            'Function'=> 'ListGrade(3)',
            'Url' => 'administration/teacher/score',   
            'menu_id' => '10'          
        ]);
        DB::table('menus')->insert([
            'Name' => 'Visualización de examenes',
            'State' => '1',
            'Type' => '4',
            'Function'=> 'ListGrade(4)',
            'Url' => 'administration/teacher/test',   
            'menu_id' => '10'          
        ]);
        DB::table('menus')->insert([ //15
            'Name' => 'Estadisticas generales',
            'State' => '1',
            'Url' => 'administration/teacher/statistics',  
            'menu_id' => '10'          
        ]);       
        DB::table('menus')->insert([
            'Name' => 'Administración', //16
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
            'Name' => 'Ver listado de notas aprobadas',
            'State' => '1',
            'Type' => '4',
            'Function'=> 'ListGrade(6)',
            'Url' => 'administration/workspace/attendant/notes',  
            'menu_id' => '16'          
        ]);  
        DB::table('menus')->insert([ //19
            'Name' => 'Ver inscripciones',
            'State' => '1',
            'Url' => 'administration/workspace/inscriptions',  
            'menu_id' => '16'          
        ]);  
        DB::table('menus')->insert([ //20
            'Name' => 'Estadisticas generales ',
            'State' => '1',
            'Url' => 'administration/workspace/statistics',  
            'menu_id' => '16'          
        ]);  
        DB::table('menus')->insert([
            'Name' => 'Configuración', //21
            'Icon' => 'pe-7s-home',
            'Url' => 'administration/configurations',
            'State' => '1',     
            'Order' => '5',      
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
            'Name' => 'Inicio', //24
            'Icon' => 'pe-7s-home',
            'Url' => 'student/home',
            'State' => '1',     
            'Order' => '6',      
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
            'menu_id' => '26'          
        ]); 
        DB::table('menus')->insert([
            'Name' => 'Notas', //27
            'Icon' => 'pe-7s-home',
            'Url' => 'student/score',
            'State' => '1',     
            'Order' => '7',      
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
            'Order' => '8',      
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
            'Order' => '9',      
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
            'Function'=> 'listCourse(4)',
            'Type' => '3',
            'Url' => 'teacher/home/workspace',
            'menu_id' => '32'          
        ]); 
        DB::table('menus')->insert([
            'Name' => 'Notas', //35
            'Icon' => 'pe-7s-home',
            'Url' => 'teacher/score',
            'State' => '1',     
            'Order' => '10',      
        ]);
        DB::table('menus')->insert([ 
            'Name' => 'Visualizar notas',
            'State' => '1',
            // 'Url' => 'teacher/score/list/vol',  //36
            'Type' => '3',
            'Function'=> 'listCourse(1)',
            'Url' => 'teacher/score/list/vol',       
            'menu_id' => '35'
        ]); 
        DB::table('menus')->insert([
            'Name' => 'Examenes', //37
            'Icon' => 'pe-7s-home',
            'Url' => 'teacher/test',
            'State' => '1',     
            'Order' => '11',      
        ]);
        DB::table('menus')->insert([ 
            'Name' => 'Visualizar examenes programados',
            'State' => '1',
             'Url' => 'teacher/test/view',  //38
            'Type' => '3',
            'Function'=> 'listCourse(3)',
            'menu_id' => '37'          
        ]); 
        DB::table('menus')->insert([ 
            'Name' => 'Visualizar todos los examenes',
            'State' => '1',
            'Url' => 'teacher/test/list/vol',  //39
            'Type' => '3',
            'Function' => 'listCourse(2)',
            'menu_id' => '37'      
        ]); 
        DB::table('menus')->insert([ 
            'Name' => 'Calificar examenes',
            'State' => '1',
            'Url' => 'teacher/test/list/vol',  //40
            'Type' => '3',
            'Function' => 'listCourse(5)',
            'menu_id' => '37'      
        ]); 






            //Attendant
            DB::table('menus')->insert([
                'Name' => 'Inicio', //41
                'Icon' => 'pe-7s-home',
                'Url' => 'attendant/home',
                'State' => '1',     
                'Order' => '10',      
            ]);
            DB::table('menus')->insert([ 
                'Name' => 'Tablero',
                'State' => '1',
                'Url' => 'attendant/home/dashboard',  //42
                'menu_id' => '41'          
            ]); 
            DB::table('menus')->insert([ 
                'Name' => 'Espacio de trabajo', 
                'State' => '1',
                'Url' => 'attendant/home/workspace',  //43
                'Type' => '4',
                'Function' => 'ListGrade(4)',
                'menu_id' => '41'          
            ]); 
            DB::table('menus')->insert([
                'Name' => 'Notas', //44
                'Icon' => 'pe-7s-home',
                'Url' => 'attendant/notes',
                'State' => '1',     
                'Order' => '10',      
            ]);
            DB::table('menus')->insert([ 
                'Name' => 'Visualizar notas',
                'State' => '1',
                'Url' => 'attendant/score/list/',  //45
                'Type' => '4',
                'Function' => 'ListGrade(7)',       
                'menu_id' => '44'
            ]); 
            DB::table('menus')->insert([ 
                'Name' => 'Visualizar notas aprobadas y reprobadas',
                'State' => '1',
                // 'Url' => 'teacher/test/view',  //46
                'Url' => 'attendant/notes/aproved',
                'menu_id' => '44'          
            ]); 
            
    }
}
