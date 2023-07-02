<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'root',
                'full_name' => 'Root'
            ],
            [
                'name' => 'admin',
                'full_name' => 'Admin'
            ],
            [
                'name' => 'guru',
                'full_name' => 'Guru'
            ],
            [
                'name' => 'siswa',
                'full_name' => 'Siswa'
            ]
        ];

        foreach ($data as $item) {
            $role = Role::create($item);
        }
    }
}
