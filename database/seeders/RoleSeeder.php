<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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

        $data_permissions = [
            [
                'name' => 'list user'
            ],
            [
                'name' => 'tambah user'
            ],
            [
                'name' => 'hapus user'
            ],
            [
                'name' => 'edit user'
            ]
        ];

        foreach ($data_permissions as $item) {
            Permission::create($item);
        }

        foreach ($data as $item) {
            $role = Role::create($item);
            if ($role->name == 'root') {
                $role->givePermissionTo(['list user', 'tambah user', 'hapus user', 'edit user']);
            }
        }
    }
}
