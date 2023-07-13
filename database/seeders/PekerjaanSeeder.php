<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Pekerjaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pekerjaan = [
            ['nama' => 'Guru'],
            ['nama' => 'Dokter'],
            ['nama' => 'Akuntan'],
            ['nama' => 'Insinyur'],
            ['nama' => 'Pengacara'],
            ['nama' => 'Pilot'],
            ['nama' => 'Polisi'],
            ['nama' => 'Perawat'],
            ['nama' => 'Penyiar'],
            ['nama' => 'Desainer Grafis'],
            ['nama' => 'Programmer'],
            ['nama' => 'Arsitek'],
            ['nama' => 'Petani'],
            ['nama' => 'Wiraswasta'],
            ['nama' => 'Pelayan Restoran'],
            ['nama' => 'Sales'],
            ['nama' => 'Peneliti'],
            ['nama' => 'Seniman'],
            ['nama' => 'Bankir'],
            ['nama' => 'Montir'],
        ];

        Pekerjaan::insert($pekerjaan);
    }
}
