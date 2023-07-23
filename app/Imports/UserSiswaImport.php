<?php

namespace App\Imports;

use App\Models\Kelas;
use App\Models\Orangtua;
use App\Models\Pekerjaan;
use App\Models\Profile;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Spatie\Permission\Models\Role;

class UserSiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private $rowsCount = 0;

    public function model(array $row)
    {
        ++$this->rowsCount;
        $user = new User([
            'name' => $row[1],
            'email' => $row[2],
            'username' => $row[3],
            'password' => Hash::make($row[3]),
            'role_id' => 3,
            'is_verified' => true
        ]);
        $role = Role::find(3);
        $profile = new Profile([
            'user_id' => $user->id,
            'alamat' => $row[4],
            'gender' => $row[5],
            'tempat_lahir' => $row[6],
            'tanggal_lahir' => $row[7],
            'agama' => $row[8],
            'golongan_darah' => $row[9]
        ]);

        $orangtua = Orangtua::where('nik_ayah', $row[17])->where('nik_ibu', $row[18])->first();
        if (!$orangtua) {
            $pekerjaan_ayah = Pekerjaan::where('nama', $row[15])->first();
            $pekerjaan_ibu = Pekerjaan::where('nama', $row[16])->first();
            $orangtua = new Orangtua([
                'nama_ayah' => $row[11],
                'nama_ibu' => $row[12],
                'alamat_ayah' => $row[13],
                'alamat_ibu' => $row[14],
                'id_pekerjaan_ayah' => $pekerjaan_ayah,
                'id_pekerjaan_ibu' => $pekerjaan_ibu,
                'nik_ayah' => $row[17],
                'nik_ibu' => $row[18],
            ]);
        }

        $kelas = Kelas::where('nama', $row[19])->where('tahun_ajaran', $row[20])->first();
        if (!$kelas) {
            $kelas = Kelas::create([
                'nama' => $row[19],
                'id_walikelas' => 1,
                'tahun_ajaran' => $row[20]
            ]);
        }

        $siswa = new Siswa([
            'id_user' => $user->id,
            'id_orangtua' => $orangtua->id,
            'id_kelas' => $kelas->id,
            'nis' => $row[3],
            'nisn' => $row[4]
        ]);

        $user->assignRole($role->name);
    }

    public function getRowCount()
    {
        return $this->rowsCount;
    }
}
