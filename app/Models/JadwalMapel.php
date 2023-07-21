<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMapel extends Model
{
    use HasFactory;
    protected $table = 'jadwal_mapel';
    protected $guarded = ['id'];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
}
