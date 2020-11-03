<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            $id = DB::table('levels')->insertGetIdDB([
                'Name' => $value,
                'State' => 'Active',       
            ]);
            DB::table('levels')->insert([
                'Name' => $value,
                'State' => 'Active',       
            ]);
        }
        $GradesList = ["Primero","Segundo","Tercero","Cuarto","Quinto","Sexto"];
        foreach ($GradesList as $value) {
            DB::table('grades')->insert([
                'Name' => $value,
                'State' => 'Active',       
            ]);
        }
    }
}
