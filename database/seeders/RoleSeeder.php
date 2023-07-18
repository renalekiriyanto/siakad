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
            ],
            [
                'name' => 'tambah jadwal'
            ],
            [
                'name' => 'list jadwal'
            ],
            [
                'name' => 'edit jadwal'
            ],
            [
                'name' => 'hapus jadwal'
            ],
            [
                'name' => 'tambah profile'
            ],
            [
                'name' => 'show profile'
            ],
            [
                'name' => 'edit profile'
            ],
            [
                'name' => 'hapus profile'
            ],
        ];

        foreach ($data_permissions as $item) {
            Permission::create($item);
        }

        foreach ($data as $item) {
            $role = Role::create($item);
            $role->givePermissionTo(['tambah profile', 'show profile', 'edit profile']);
            if ($role->name == 'admin') {
                foreach ($data_permissions as $item) {
                    $role->givePermissionTo($item['name']);
                }
            } else if ($role->name == 'guru') {
                $role->givePermissionTo('list user');
            }
        }
    }
}
