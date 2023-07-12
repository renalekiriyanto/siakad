<?php

namespace Database\Seeders;

use App\Models\Pangkat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PangkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataPangkat = [
            ['nama' => 'Guru Pertama'],
            ['nama' => 'Guru Muda'],
            ['nama' => 'Guru Madya'],
            ['nama' => 'Guru Utama'],
            ['nama' => 'Lektor'],
            ['nama' => 'Lektor Kepala'],
            ['nama' => 'Guru Besar'],
        ];
        Pangkat::insert($dataPangkat);
    }
}
