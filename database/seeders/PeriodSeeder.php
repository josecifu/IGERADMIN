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
        $periodsList = ["13-01-001 (Viernes IGER)","13-01-004 (Sábados IGER)","13-01-006 (Domingos MA)","13-01-019 (Domingos IGER)"];
        foreach ($periodsList as $value) {
            DB::table('periods')->insert([
                'Name' => $value,
                'State' => 'Active',       
            ]);
        }
        $LevelList =["Básico"];
        foreach ($LevelList as $value) {
            $id = DB::table('levels')->insertGetId([
                'Name' => $value,
                'Period_id' => 1,
                'State' => 'Active',       
            ]);
            $GradesList = ["Primero","Segundo","Tercero"];
            foreach ($GradesList as $key => $value) {
                if($id==1)
                {
                    DB::table('grades')->insert([
                        'Name' => $value,
                        'Level_id' => $id,
                        'State' => 'Active',       
                    ]);
                
                } 
            }   
             
        }
    }
}
