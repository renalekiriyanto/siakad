<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliSiswa extends Model
{
    use HasFactory;
    protected $table = 'wali_siswa';
    protected $guarded = ['id'];
}
