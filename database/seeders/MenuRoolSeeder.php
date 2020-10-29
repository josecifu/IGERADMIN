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
        for ($menu_id=1; $menu_id <= 23; $menu_id++) { 
            DB::table('assign_menu_rols')->insert([
                'rol_id' => 1,
                'menu_id' => $menu_id,       
            ]);
        }
         
         
        
    }
}
