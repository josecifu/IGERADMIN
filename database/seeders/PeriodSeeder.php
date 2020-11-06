<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodsList = ["Matutina","Vespertina"];
        foreach ($periodsList as $value) {
            DB::table('periods')->insert([
                'Name' => $value,
                'State' => 'Active',       
            ]);
        }
        $LevelList =["Primaria","Básico","Diversificado"];
        foreach ($LevelList as $value) {
            $id = DB::table('levels')->insertGetId([
                'Name' => $value,
                'Period_id' => 1,
                'State' => 'Active',       
            ]);
            $GradesList = ["Primero","Segundo","Tercero","Cuarto","Quinto","Sexto"];
            foreach ($GradesList as $key => $value) {
                if($id==1)
                {
                    DB::table('grades')->insert([
                        'Name' => $value,
                        'Level_id' => $id,
                        'Section'=>'A',
                        'State' => 'Active',       
                    ]);
                    DB::table('grades')->insert([
                        'Name' => $value,
                        'Level_id' => $id,
                        'Section'=>'B',
                        'State' => 'Active',       
                    ]);
                } 
                if($id==2 && $key<3)
                {
                     DB::table('grades')->insert([
                        'Name' => $value,
                        'Level_id' => $id,
                        'Section'=>'A',
                        'State' => 'Active',       
                    ]);
                }
            }   
             
        }
    }
}
