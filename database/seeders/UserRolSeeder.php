<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\rol;
use App\Models\User ;
class UserRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('assign_user_rols')->insert([
            'Rol_id' => 1,
            'user_id' => 1,
           	'State' => "Active",            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
         DB::table('assign_user_rols')->insert([
            'Rol_id' => 2,
            'user_id' => 2,
            'State' => "Active",            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
