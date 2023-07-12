<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataGolongan = [
            ["nama" => "I/a", "pangkat" => "Juru Muda"],
            ["nama" => "I/b", "pangkat" => "Juru Muda Tingkat I"],
            ["nama" => "I/c", "pangkat" => "Juru"],
            ["nama" => "I/d", "pangkat" => "Juru Tingkat I"],
            ["nama" => "II/a", "pangkat" => "Pengatur Muda"],
            ["nama" => "II/b", "pangkat" => "Pengatur Muda Tingkat I"],
            ["nama" => "II/c", "pangkat" => "Pengatur"],
            ["nama" => "II/d", "pangkat" => "Pengatur Tingkat I"],
            ["nama" => "III/a", "pangkat" => "Penata Muda"],
            ["nama" => "III/b", "pangkat" => "Penata Muda Tingkat I"],
            ["nama" => "III/c", "pangkat" => "Penata"],
            ["nama" => "III/d", "pangkat" => "Penata Tingkat I"],
            ["nama" => "IV/a", "pangkat" => "Pembina"],
            ["nama" => "IV/b", "pangkat" => "Pembina Tingkat I"],
            ["nama" => "IV/c", "pangkat" => "Pembina Utama Muda"],
            ["nama" => "IV/d", "pangkat" => "Pembina Utama Madya"],
            ["nama" => "IV/e", "pangkat" => "Pembina Utama"],
        ];

        Golongan::insert($dataGolongan);
    }
}
