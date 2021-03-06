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
        for ($menu_id=1; $menu_id <= 22; $menu_id++) { 
            DB::table('assign_menu_rols')->insert([
                'rol_id' => 1,
                'menu_id' => $menu_id,       
            ]);
        }
        //Student
        for ($menu_id=24; $menu_id <= 31; $menu_id++) { 
            DB::table('assign_menu_rols')->insert([
                'rol_id' => 2,
                'menu_id' => $menu_id,       
            ]);
        }
        //teacher
        for ($menu_id=32; $menu_id <= 40; $menu_id++) { 
            DB::table('assign_menu_rols')->insert([
                'rol_id' => 3,
                'menu_id' => $menu_id,       
            ]);
        }
        //attendat
        for ($menu_id=41; $menu_id <= 46; $menu_id++) { 
            DB::table('assign_menu_rols')->insert([
                'rol_id' => 4,
                'menu_id' => $menu_id,       
            ]);
        }
    }
}
