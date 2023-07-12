<?php

namespace Database\Seeders;

use App\Models\Pendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataPendidikan = [
            ['tingkat' => 'SD', 'nama' => 'Sekolah Dasar'],
            ['tingkat' => 'SMP', 'nama' => 'Sekolah Menengah Pertama'],
            ['tingkat' => 'SMA', 'nama' => 'Sekolah Menengah Atas'],
            ['tingkat' => 'D3', 'nama' => 'Diploma 3'],
            ['tingkat' => 'S1', 'nama' => 'Sarjana (S1)'],
            ['tingkat' => 'S2', 'nama' => 'Magister (S2)'],
            ['tingkat' => 'S3', 'nama' => 'Doktor (S3)'],
        ];

        Pendidikan::insert($dataPendidikan);
    }
}
