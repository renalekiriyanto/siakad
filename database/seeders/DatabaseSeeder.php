<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PangkatSeeder::class,
            GolonganSeeder::class,
            PendidikanSeeder::class,
            JabatanSeeder::class,
            JurusanSeeder::class,
            PekerjaanSeeder::class
        ]);
    }
}
