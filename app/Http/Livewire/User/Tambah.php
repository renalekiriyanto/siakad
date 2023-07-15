<?php

namespace App\Http\Livewire\User;

use App\Models\Golongan;
use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\Orangtua;
use App\Models\Pangkat;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Profile;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class Tambah extends Component
{
    use WithFileUploads;

    public $password;
    public $showPassword;
    public $role;
    public $username;
    public $name;
    public $email;
    // Stepper
    public $stepper;
    public $list_stepper = [];
    // Profile
    public $alamat;
    public $no_hp;
    public $photo;
    public $gender;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $agama;
    public $golongan_darah;
    // Guru
    public $nuptk;
    public $nrg;
    public $pangkat;
    public $golongan;
    public $jabatan;
    public $pendidikan;
    public $nip;
    public $nik;
    public $list_pangkat;
    public $list_golongan;
    public $list_jabatan;
    public $list_pendidikan;
    // Siswa
    public $nis;
    public $nisn;
    // Orangtua
    public $nama_ayah;
    public $nama_ibu;
    public $alamat_ayah;
    public $alamat_ibu;
    public $nik_ayah;
    public $nik_ibu;
    public $pekerjaan_ayah;
    public $pekerjaan_ibu;
    public $list_pekerjaan;

    public function mount()
    {
        $this->stepper = 1;
        $this->showPassword = false;
        $this->list_stepper = new Collection();
        $this->list_stepper->push([
            'value' => 1,
            'slug' => 'user',
            'name' => 'User'
        ]);
        $this->list_stepper->push([
            'value' => 2,
            'slug' => 'profile',
            'name' => 'Profile'
        ]);
        $this->list_pangkat = Pangkat::all();
        $this->list_golongan = Golongan::all();
        $this->list_jabatan = Jabatan::all();
        $this->list_pendidikan = Pendidikan::all();
        $this->list_pekerjaan = Pekerjaan::all();
    }

    public function rules()
    {
        if ($this->role == 2) {
            return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['email', 'unique:users'],
                'role' => ['required'],
                'nip' => ['required', 'string', 'size:18'],
                'alamat' => ['string', 'max:255'],
                'no_hp' => ['string', 'max:255'],
                'photo' => ['image', 'max:2048'],
                'gender' => ['required', 'string'],
                'tempat_lahir' => ['required', 'string', 'max:255'],
                'tanggal_lahir' => ['required', 'date', 'max:255'],
                'nuptk' => ['required', 'string', 'size:16'],
                'nrg' => ['required', 'string', 'size:12'],
                'pangkat' => ['required', 'string', 'max:255'],
                'golongan' => ['required', 'string', 'max:255'],
                'jabatan' => ['required', 'string', 'max:255'],
                'pendidikan' => ['required', 'string', 'max:255'],
            ];
        } else if ($this->role == 3) {
            return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['email', 'unique:users'],
                'role' => ['required'],
                'nis' => ['required', 'string', 'size:18'],
                'alamat' => ['string', 'max:255'],
                'no_hp' => ['string', 'max:255'],
                'photo' => ['image', 'max:2048'],
                'gender' => ['required', 'string'],
                'tempat_lahir' => ['required', 'string', 'max:255'],
                'tanggal_lahir' => ['required', 'date', 'max:255'],
                'nuptk' => ['required', 'string', 'size:16'],
                'nrg' => ['required', 'string', 'size:12'],
                'pangkat' => ['required', 'string', 'max:255'],
                'golongan' => ['required', 'string', 'max:255'],
                'jabatan' => ['required', 'string', 'max:255'],
                'pendidikan' => ['required', 'string', 'max:255']
            ];
        } else {
            return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['email', 'unique:users'],
                'role' => ['required'],
                'username' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'max:255'],
                'alamat' => ['string', 'max:255'],
                'photo' => ['image', 'max:2048'],
                'no_hp' => ['string', 'max:255'],
                'gender' => ['required', 'string'],
                'tempat_lahir' => ['required', 'string', 'max:255'],
                'tanggal_lahir' => ['required', 'date', ' max:255'],
            ];
        }
    }

    public function render()
    {

        $list_gender = [
            [
                'value' => 'L',
                'nama' => 'Laki-laki'
            ],
            [
                'value' => 'P',
                'nama' => 'Perempuan'
            ]
        ];
        $list_agama = [
            [
                'value' => 'Islam'
            ],
            [
                'value' => 'Katolik'
            ],
            [
                'value' => 'Protestan'
            ],
            [
                'value' => 'Hindu'
            ],
            [
                'value' => 'Buddha'
            ]
        ];
        // Costum stepper
        if ($this->role == 2) {
            if (count($this->list_stepper) > 2) {
                $this->list_stepper->splice(2);
            }
            $this->list_stepper->push([
                'value' => 3,
                'slug' => 'guru',
                'name' => 'Informasi Guru'
            ]);
        }
        if ($this->role == 3) {
            if (count($this->list_stepper) > 2) {
                $this->list_stepper->splice(2);
            }
            $this->list_stepper->push([
                'value' => 3,
                'slug' => 'siswa',
                'name' => 'Informasi Siswa'
            ]);
        }
        $roles = Role::all();
        // If role is not admin, password will copy paste from nip/nis
        if ($this->role == 3) {
            $this->password = $this->nip;
        } else if ($this->role == 4) {
            $this->password = $this->nis;
        }
        return view('livewire.user.tambah', compact('list_gender', 'list_agama', 'roles'));
    }

    public function store()
    {
        // $this->validate();
        if ($this->role == 2) {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'role_id' => $this->role,
                'username' => $this->nip,
                'password' => Hash::make($this->nip),
                'is_verified' => true
            ]);
        } else if ($this->role == 3) {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'username' => $this->nis,
                'role_id' => $this->role,

                'password' => Hash::make($this->nis),
                'is_verified' => true
            ]);
        } else {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'username' => $this->username,
                'password' => Hash::make($this->password),
                'is_verified' => true
            ]);
        }
        $role = Role::find($this->role);
        $user->assignRole($role->name);

        $photo = $this->photo->store('profiles');

        $profile = Profile::create([
            'user_id' => $user->id,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'photo' => $photo,
            'gender' => $this->gender,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'agama' => $this->agama,
            'golongan_darah' => $this->golongan_darah
        ]);

        // Guru
        if ($this->role == 2) {
            $guru = Guru::create([
                'id_user' => $user->id,
                'nip' => $this->nip,
                'nuptk' => $this->nuptk,
                'nrg' => $this->nrg,
                'id_pangkat' => $this->pangkat,
                'id_golongan' => $this->golongan,
                'id_jabatan' => $this->jabatan,
                'id_pendidikan' => $this->pendidikan,
                'nik' => $this->nik
            ]);
        }
        // Siswa
        if ($this->role == 3) {
            $orangtua = Orangtua::where('nik_ayah', $this->nik_ayah)->orWhere('nik_ibu', $this->nik_ibu)->first();
            if (!$orangtua) {
                $orangtua = Orangtua::create([
                    'nama_ayah' => $this->nama_ayah,
                    'nama_ibu' => $this->nama_ibu,
                    'alamat_ayah' => $this->alamat_ayah,
                    'alamat_ibu' => $this->alamat_ibu,
                    'id_pekerjaan_ayah' => $this->pekerjaan_ayah,
                    'id_pekerjaan_ibu' => $this->pekerjaan_ibu,
                    'nik_ayah' => $this->nik_ayah,
                    'nik_ibu' => $this->nik_ibu,
                ]);
            }
            $siswa = Siswa::create([
                'id_user' => $user->id,
                'nis' => $this->nis,
                'nisn' => $this->nisn,
                'id_orangtua' => $orangtua->id
            ]);
        }
        return redirect()->with('success')->route('user');
    }

    public function increment()
    {
        $this->stepper += 1;
    }

    public function decrement()
    {
        $this->stepper -= 1;
    }
}
