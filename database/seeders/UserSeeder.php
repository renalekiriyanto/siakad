<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'root')->first();

        $user = User::create([
            'name' => 'Renal Eki Riyanto',
            'username' => 'renaleki',
            'email' => 'renaleki@test.com',
            'password' => Hash::make('password'),
            'role_id' => $role->id
        ]);

        $user->assignRole('root');

        $profile = Profile::create([
            'user_id' => $user->id,
            'alamat' => 'Dusun Pengijauan Kari',
            'no_hp' => '082390460261',
            'gender' => 'L',
            'tempat_lahir' => 'Dusun Pengijauan Kari',
            'tanggal_lahir' => Carbon::parse('1999-07-16')->format('Y-m-d'),
            'agama' => 'Islam',
            'golongan_darah' => 'AB+'
        ]);
    }
}
