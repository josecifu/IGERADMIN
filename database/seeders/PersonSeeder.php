<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('people')->insert([
            'Names' => 'Admin',
            'LastNames' => 'Administrador',
           	'Address' =>"Principal",           
            'Phone' => '+000000000',     
            'BirthDate' => '23/08/09',      
        ]);
        DB::table('people')->insert([
            'Names' => 'Estudiante',
            'LastNames' => 'Estudiante',
            'Address' =>"Principal",           
            'Phone' => '+000000000',     
            'BirthDate' => '23/08/09',      
        ]);
        DB::table('people')->insert([
            'Names' => 'Voluntario',
            'LastNames' => 'Voluntario',
            'Address' =>"Principal",           
            'Phone' => '+000000000',     
            'BirthDate' => '23/08/09',      
        ]);
    }
}
