<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $guarded = ['id'];

    public function walikelas()
    {
        return $this->belongsTo(Guru::class, 'id_walikelas', 'id');
    }
}
