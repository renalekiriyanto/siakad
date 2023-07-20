<?php

namespace Tests\Feature;

use App\Models\Kelas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KelasTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateKelas()
    {
        $kelasData = [
            'nama' => 'Kelas 1A',
            'tahun_ajaran' => '2023/2024',
        ];

        // Memastikan bahwa kelas baru berhasil dibuat
        $kelas = Kelas::create($kelasData);

        $this->assertEquals($kelasData['nama'], $kelas->nama);
        $this->assertEquals($kelasData['tahun_ajaran'], $kelas->tahun_ajaran);
    }

    public function testReadKelas()
    {
        // Membuat data kelas baru untuk pengujian
        $kelasData = [
            'nama' => 'Kelas 2A',
            'tahun_ajaran' => '2023/2024',
        ];

        $kelas = Kelas::create($kelasData);

        // Membaca data kelas dari database
        $kelasDariDatabase = Kelas::find($kelas->id);

        $this->assertEquals($kelasData['nama'], $kelasDariDatabase->nama);
        $this->assertEquals($kelasData['tahun_ajaran'], $kelasDariDatabase->tahun_ajaran);
    }

    public function testUpdateKelas()
    {
        // Membuat data kelas baru untuk pengujian
        $kelasData = [
            'nama' => 'Kelas 3A',
            'tahun_ajaran' => '2023/2024',
        ];

        $kelas = Kelas::create($kelasData);

        // Memperbarui data kelas
        $updatedData = [
            'nama' => 'Kelas 4A',
            'tahun_ajaran' => '2024/2025',
        ];

        $kelas->update($updatedData);

        // Membaca data kelas yang sudah diperbarui dari database
        $kelasDariDatabase = Kelas::find($kelas->id);

        $this->assertEquals($updatedData['nama'], $kelasDariDatabase->nama);
        $this->assertEquals($updatedData['tahun_ajaran'], $kelasDariDatabase->tahun_ajaran);
    }

    public function testDeleteKelas()
    {
        // Membuat data kelas baru untuk pengujian
        $kelasData = [
            'nama' => 'Kelas 5A',
            'tahun_ajaran' => '2023/2024',
        ];

        $kelas = Kelas::create($kelasData);

        // Menghapus data kelas dari database
        $kelas->delete();

        // Memastikan bahwa data kelas sudah tidak ada di database
        $kelasDariDatabase = Kelas::find($kelas->id);
        $this->assertNull($kelasDariDatabase);
    }
}
