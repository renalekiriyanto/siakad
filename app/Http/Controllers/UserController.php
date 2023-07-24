<?php

namespace App\Http\Controllers;

use App\Imports\UserSiswaImport;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Orangtua;
use App\Models\Pekerjaan;
use App\Models\Profile;
use App\Models\Siswa;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $data = User::filter(request(['search']))->paginate(10);
        $user = $this->user;

        return view('User.index', compact('data', 'user'));
    }

    public function tambah()
    {
        $user = $this->user;
        return view('User.tambah', compact('user'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $userSelect = User::find($id);
        $list_role = Role::all();
        return view('User.edit', compact('user', 'userSelect', 'list_role'));
    }

    public function update(Request $request, $id)
    {
        $userSelect = User::find($id);

        if ($userSelect->role->name == 'guru') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['email', 'string'],
                'nip' => ['required', 'string', 'size:18']
            ]);

            $userSelect->update([
                'username' => $request->nip,
                'password' => Hash::make($request->nip)
            ]);
            $guru = Guru::where('id_user', $userSelect->id)->first();
            $guru->update([
                'nip' => $request->nip
            ]);
        } else if ($userSelect->role->name == 'siswa') {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['email', 'string'],
                'nis' => ['required', 'string', 'size:10']
            ]);

            $userSelect->update([
                'username' => $request->nis,
                'password' => Hash::make($request->nis)
            ]);
            $siswa = Siswa::where('id_user', $userSelect->id)->first();
            $siswa->update([
                'nis' => $request->nis
            ]);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['email', 'string'],
                'username' => ['required', 'string', 'size:10']
            ]);

            $userSelect->update([
                'username' => $request->username,
                'password' => Hash::make($request->username)
            ]);
        }

        return redirect()->route('user')->with('status', 'Berhasil update data.');
    }

    public function lock_user(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'string']
        ]);

        $currentUser = Auth::user();
        // User harus masukkan passsword dulu untuk melakukan aksi kunci user
        if (Hash::check($request->password, $currentUser->password)) {
            $user->is_verified = !$user->is_verified;
            $user->save();
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['password' => 'Password yang dimasukkan salah.']);
        }
    }
    // Excel
    public function import_siswa(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:csv,xls,xlsx']
        ]);
        // Get file excel
        $file = $request->file('file');
        // Insert data user from excel was uploaded
        $import = new UserSiswaImport;
        // Excel::import($import, $file);
        $data = Excel::toArray($import, $file);
        $dataFailedInsert = new Collection();
        $dataSuccessInsert = new Collection();
        $rowCount = 0;
        foreach ($data as $item) {
            foreach ($item as $i) {
                $nama = $i[1];
                $email = $i[2];
                $nis = $i[3];
                $nisn = $i[4];
                $alamat = $i[5];
                $gender = $i[6];
                $tempat_lahir = $i[7];
                $tanggal_lahir = $i[8];
                $agama = $i[9];
                $golongan_darah = $i[10];
                $nama_ayah = $i[11];
                $nama_ibu = $i[12];
                $alamat_ayah = $i[13];
                $alamat_ibu = $i[14];
                $nama_pekerjaan_ayah = $i[15];
                $nama_pekerjaan_ibu = $i[16];
                $nik_ayah = $i[17];
                $nik_ibu = $i[18];
                $nama_kelas = $i[19];
                $tahun_ajaran = $i[20];
                $no_hp = $i[21];

                $data = [
                    'nama' => $nama,
                    'email' => $email,
                    'nis' => $nis,
                    'nisn' => $nisn,
                    'alamat' => $alamat,
                    'gender' => $gender,
                    'tempat_lahir' => $tempat_lahir,
                    'agama' => $agama,
                    'golongan_darah' => $golongan_darah,
                    'nama_ayah' => $nama_ayah,
                    'nama_ibu' => $nama_ibu,
                    'alamat_ayah' => $alamat_ayah,
                    'alamat_ibu' => $alamat_ibu,
                    'nama_pekerjaan_ayah' => $nama_pekerjaan_ayah,
                    'nama_pekerjaan_ibu' => $nama_pekerjaan_ibu,
                    'nik_ayah' => $nik_ayah,
                    'nik_ibu' => $nik_ibu,
                    'nama_kelas' => $nama_kelas,
                    'tahun_ajaran' => $tahun_ajaran,
                    'no_hp' => $no_hp,
                    'status' => null
                ];

                $user = User::where('username', $nis)->first();
                if ($user) {
                    $data['status'] = 'User sudah ada.';
                    $dataFailedInsert->push($data);
                }

                $user = User::create([
                    'name' => $nama,
                    'email' => $email,
                    'username' => $nis,
                    'password' => Hash::make($nis),
                    'role_id' => 3,
                    'is_verified' => true
                ]);

                $profile = Profile::create([
                    'user_id' => $user->id,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'gender' => $gender,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => Carbon::parse($tanggal_lahir)->format('Y-m-d'),
                    'agama' => $agama,
                    'golongan_darah' => $golongan_darah,
                ]);

                $user->assignRole('siswa');

                $orangtua = Orangtua::where('nama_ayah', 'like', "%$nama_ayah%")->where('nik_ayah', $nik_ayah)->where('nama_ibu', 'like', "%$nama_ibu%")->where('nik_ibu', $nik_ibu)->first();
                if (!$orangtua) {
                    $pekerjaanayah = Pekerjaan::where('nama', $nama_pekerjaan_ayah)->first();
                    $pekerjaanibu = Pekerjaan::where('nama', $nama_pekerjaan_ibu)->first();
                    $orangtua = Orangtua::create([
                        'nama_ayah' => $nama_ayah,
                        'alamat_ayah' => $alamat_ayah,
                        'id_pekerjaan_ayah' => $pekerjaanayah->id,
                        'nik_ayah' => $nik_ayah,
                        'nama_ibu' => $nama_ibu,
                        'alamat_ibu' => $alamat_ibu,
                        'id_pekerjaan_ibu' => $pekerjaanibu->id,
                        'nik_ibu' => $nik_ibu,
                    ]);
                }

                $kelas = Kelas::where('nama', 'like', "%$nama_kelas%")->where('tahun_ajaran', $tahun_ajaran)->first();

                $siswa = Siswa::create([
                    'id_user' => $user->id,
                    'id_orangtua' => $orangtua->id,
                    'id_kelas' => $kelas->id,
                    'nis' => $nis,
                    'nisn' => $nisn
                ]);

                $data['status'] = 'success';
                $rowCount++;
            }
        }
        return redirect()->route('user')->with('success', "Berhasil tambah user sebanyak $rowCount");
    }

    public function import_guru(Request $request)
    {
    }

    // API
    public function api_showguru(Guru $guru)
    {
        return response()->json($guru);
    }
}
