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
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'admin')->first();

        $user = User::create([
            'name' => 'Renal Eki Riyanto',
            'username' => 'renaleki',
            'email' => 'renaleki@test.com',
            'password' => Hash::make('password'),
            'role_id' => $role->id,
            'is_verified' => true
        ]);

        $user->assignRole('admin');

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

        // Faker user

        // $faker = Faker::create('id_ID');
        // for ($i = 1; $i <= 50; $i++) {
        //     $user = User::create([
        //         'name' => $faker->name(),
        //         'username' => $faker->userName(),
        //         'email' => $faker->email(),
        //         'password' => Hash::make('password'),
        //         'role_id' => $faker->numberBetween(1, 3)
        //     ]);
        //     $role = Role::find($user->role_id)->first();
        //     $user->assignRole($role->name);
        //     if ($user->role_id === 1) {
        //         $user->is_verified = true;
        //         $user->save();
        //     }

        //     $profile = Profile::create([
        //         'user_id' => $user->id,
        //         'alamat' => $faker->address(),
        //         'no_hp' => $faker->phoneNumber(),
        //         'gender' => $faker->randomElement(['L', 'P']),
        //         'tempat_lahir' => $faker->address(),
        //         'tanggal_lahir' => $faker->date('Y_m_d'),
        //         'agama' => $faker->randomElement(['Islam', 'Katolik', 'Protestan', 'Buddha', 'Hindu'], null),
        //         'golongan_darah' => $faker->randomElement(['O+', 'A+', 'B+', 'AB+', 'O-', 'A-', 'B-', 'AB-'], null)
        //     ]);
        // }
    }
}
