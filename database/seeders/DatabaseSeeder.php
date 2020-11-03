<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(PersonSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(UserRolSeeder::class);
        $this->call(MenuRoolSeeder::class);
        $this->call(PermsSeeder::class);
        $this->call(PermsRolSeeder::class);
        $this->call(PeriodSeeder::class);
    }
}
