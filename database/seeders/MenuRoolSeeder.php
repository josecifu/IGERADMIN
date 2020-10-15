<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MenuRoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Asignacion Administracion
         DB::table('assign_menu_rols')->insert([
            'rol_id' => 1,
            'menu_id' => 1,       
        ]);
         DB::table('assign_menu_rols')->insert([
            'rol_id' => 1,
            'menu_id' => 2,       
        ]);
         DB::table('assign_menu_rols')->insert([
            'rol_id' => 1,
            'menu_id' => 3,       
        ]);
         DB::table('assign_menu_rols')->insert([
            'rol_id' => 1,
            'menu_id' => 4,       
        ]);
         DB::table('assign_menu_rols')->insert([
            'rol_id' => 1,
            'menu_id' => 5,       
        ]);
           DB::table('assign_menu_rols')->insert([
            'rol_id' => 1,
            'menu_id' => 6,       
        ]);
             DB::table('assign_menu_rols')->insert([
            'rol_id' => 1,
            'menu_id' => 7,       
        ]);
            DB::table('assign_menu_rols')->insert([
            'rol_id' => 1,
            'menu_id' => 8,       
        ]);

        // ASIGNACION ESTUDIANTES
        DB::table('assign_menu_rols')->insert([
            'rol_id' =>2 ,
            'menu_id' => 1,       
        ]);
         DB::table('assign_menu_rols')->insert([
            'rol_id' => 2,
            'menu_id' => 2,       
        ]);

        // Asignacion Voluntarios
        DB::table('assign_menu_rols')->insert([
            'rol_id' =>3,
            'menu_id' => 1,       
        ]);
         DB::table('assign_menu_rols')->insert([
            'rol_id' => 3,
            'menu_id' => 2,       
        ]);
        DB::table('assign_menu_rols')->insert([
            'rol_id' => 3,
            'menu_id' => 4,       
        ]);
        DB::table('assign_menu_rols')->insert([
            'rol_id' => 3,
            'menu_id' => 9,       
        ]);
        DB::table('assign_menu_rols')->insert([
            'rol_id' => 3,
            'menu_id' => 10,       
        ]);
        DB::table('assign_menu_rols')->insert([
            'rol_id' => 3,
            'menu_id' => 11, 
        ]);
        DB::table('assign_menu_rols')->insert([
            'rol_id' => 3,
            'menu_id' => 12,   
        ]);
        DB::table('assign_menu_rols')->insert([
            'rol_id' => 3,
            'menu_id' => 13,   
        ]);
    }
}
