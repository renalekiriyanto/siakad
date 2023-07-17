<?php

namespace App\Http\Controllers;

use App\Models\Profile;
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

    public function edit($user)
    {
        $user = Auth::user();
        $userSelect = User::find($user);
        $list_role = Role::all();
        return view('User.edit', compact('user', 'userSelect', 'list_role'));
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
