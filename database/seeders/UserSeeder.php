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
       
        $this->command->info('Se ha creado el usuario de administrador con exito');
    }
}
