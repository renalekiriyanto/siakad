<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class Tambah extends Component
{
    use WithFileUploads;

    public $photo;
    public $password;
    public $showPassword;
    public $role;
    public $nis;
    public $nip;
    public $username;
    public $name;
    public $email;
    // Stepper
    public $stepper;
    public $list_stepper = [];

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

    public function increment()
    {
        $this->stepper += 1;
    }
}
