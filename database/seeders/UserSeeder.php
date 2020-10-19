<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'Email' => 'admin@admin.com',
           	'Password' => bcrypt('admin'),    
            'Person_id' => 1,       
            'State' => 'Active',         
        ]);
        DB::table('users')->insert([
            'name' => 'Estudiante',
            'Email' => 'Estudiante@admin.com',
            'Password' => bcrypt('estudiante'),    
            'Person_id' => 2,       
            'State' => 'Active',         
        ]);
         DB::table('users')->insert([
            'name' => 'Voluntario',
            'Email' => 'Voluntario@admin.com',
            'Password' => bcrypt('voluntario'),    
            'Person_id' => 3,       
            'State' => 'Active',         
        ]);
        $this->command->info('Se ha creado el usuario de administrador con exito');
    }
}
