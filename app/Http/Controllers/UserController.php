<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(10);
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();

        return view('User.index', compact('data', 'profile', 'user'));
    }

    public function lock_user(Request $request, User $user)
    {
        $currentUser = Auth::user();
        $request->validate([
            'password' => ['required', 'string']
        ]);

        // User harus masukkan passsword dulu untuk melakukan aksi kunci user
        if (Hash::check([$request->password], $currentUser->password)) {
            $user->update([
                'is_verified' => false
            ]);
        } else {
            return redirect()->back()->withErrors(['password' => 'Password yang dimasukkan salah.']);
        }
    }
}
