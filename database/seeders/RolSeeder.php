<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
    		'Administrador',
            'Estudiante',
            'Voluntario',
    	];
    	foreach ($datas as $data) {
    		DB::table('rols')->insert([
            'Name' => $data,
            'State' => "Active",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        	]);
    	}
        $this->command->info('Se ha creado con exito los roles con exito');
    
    }
}
