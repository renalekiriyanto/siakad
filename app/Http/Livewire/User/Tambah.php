<?php

namespace App\Http\Livewire\User;

use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Pendidikan;
use Illuminate\Support\Collection;
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
    }

    public function rules()
    {
        if ($this->role == 2) {
            return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['email', 'not:in:' . auth()->user()->email],
                'role' => ['required'],
                'nip' => ['required', 'string', 'size:18'],
                'alamat' => ['string', 'max:255'],
                'no_hp' => ['string', 'max:255'],
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
                'email' => ['email', 'not:in:' . auth()->user()->email],
                'role' => ['required'],
                'nis' => ['required', 'string', 'size:18'],
                'alamat' => ['string', 'max:255'],
                'no_hp' => ['string', 'max:255'],
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
        }
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['email', 'not:in:' . auth()->user()->email],
            'role' => ['required'],
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'alamat' => ['string', 'max:255'],
            'no_hp' => ['string', 'max:255'],
            'gender' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', ' max:255'],
        ];
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
