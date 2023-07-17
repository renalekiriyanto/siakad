<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Profile;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function index()
    {
        $data = User::paginate(10);
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
}
