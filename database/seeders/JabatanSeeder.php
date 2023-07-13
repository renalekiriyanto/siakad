<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan = [
            [
                "nama" => "Kepala Sekolah"
            ],
            [
                "nama" => "Wakil Kepala Sekolah"
            ],
            [
                "nama" => "Sekretaris"
            ],
            [
                "nama" => "Bendahara"
            ],
            [
                "nama" => "Operator"
            ],
            [
                "nama" => "Guru"
            ]
        ];

        Jabatan::insert($jabatan);
    }
}
