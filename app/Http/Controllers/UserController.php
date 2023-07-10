<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function index()
    {
        $data = User::paginate(10);
        $user = $this->user;

        return view('User.index', compact('data', 'user'));
    }

    public function tambah()
    {
        $user = $this->user;
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
        return view('User.tambah', compact('user', 'list_gender', 'list_agama'));
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
}
