<?php

namespace App\Http\Livewire\User;

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

    public function mount()
    {
        $this->showPassword = false;
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
        $roles = Role::all();
        if ($this->role == 3) {
            $this->password = $this->nip;
        } else if ($this->role == 4) {
            $this->password = $this->nis;
        }
        return view('livewire.user.tambah', compact('list_gender', 'list_agama', 'roles'));
    }
}
