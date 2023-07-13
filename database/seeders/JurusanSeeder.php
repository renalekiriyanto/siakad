<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            ['kode' => 'AK', 'nama' => 'Akuntansi'],
            ['kode' => 'AP', 'nama' => 'Administrasi Perkantoran'],
            ['kode' => 'TB', 'nama' => 'Teknik Bisnis Sepeda Motor'],
            ['kode' => 'TKJ', 'nama' => 'Teknik Komputer dan Jaringan'],
            ['kode' => 'RPL', 'nama' => 'Rekayasa Perangkat Lunak'],
            ['kode' => 'TKR', 'nama' => 'Teknik Kendaraan Ringan'],
            ['kode' => 'TSM', 'nama' => 'Teknik Sepeda Motor'],
            ['kode' => 'TITL', 'nama' => 'Teknik Instalasi Tenaga Listrik'],
            ['kode' => 'TAV', 'nama' => 'Teknik Audio Video'],
            ['kode' => 'TPM', 'nama' => 'Teknik Pemesinan'],
            ['kode' => 'THP', 'nama' => 'Tata Hidangan dan Penyajian'],
            ['kode' => 'TBB', 'nama' => 'Tata Boga'],
            ['kode' => 'AKL', 'nama' => 'Akuntansi dan Keuangan Lembaga'],
            ['kode' => 'PM', 'nama' => 'Pemasaran'],
            ['kode' => 'APH', 'nama' => 'Agribisnis Pengolahan Hasil'],
            ['kode' => 'PH', 'nama' => 'Perhotelan'],
            ['kode' => 'GB', 'nama' => 'Geologi Pertambangan'],
            ['kode' => 'MP', 'nama' => 'Mekanisasi Pertanian'],
            ['kode' => 'PPTB', 'nama' => 'Perawatan Perbaikan Tubuh'],
            ['kode' => 'MM', 'nama' => 'Multimedia'],
            ['kode' => 'IPA', 'nama' => 'Ilmu Pengetahuan Alam'],
            ['kode' => 'IPS', 'nama' => 'Ilmu Pengetahuan Sosial'],
        ];

        Jurusan::insert($jurusan);
    }
}
