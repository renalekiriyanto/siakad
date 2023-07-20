<?php

namespace Tests\Feature;

use App\Models\Mapel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MapelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $mapel = Mapel::create([
            'nama' => 'Bahasa Indonesia'
        ]);

        $mapelDetail = Mapel::find($mapel->id);

        // Update nama mapel menjadi 'Matematika'
        $mapelDetail->update([
            'nama' => 'Matematika'
        ]);

        // Pastikan nama mapel telah diperbarui dengan benar
        $this->assertEquals('Matematika', $mapelDetail->nama);
    }
}
