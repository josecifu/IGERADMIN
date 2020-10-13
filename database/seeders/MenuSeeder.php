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
        ]);
        DB::table('menus')->insert([
            'Name' => 'Dashboard',
            'State' => '1',
            'Url' => 'administration/dashboard',  
            'menu_id' => '1'          
        ]);
    }
}
