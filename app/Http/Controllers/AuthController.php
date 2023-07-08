<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index_login()
    {
        return view('auth.login');
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::guard('web')->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    protected function authenticated(Request $request, $user)
    {
        $request->session()->regenerate();
        return redirect()->intended($this->redirectPath());
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        if (!Auth::attempt($data)) {
            abort(403, 'Unauthorized');
            return view('errors.403');
        }

        // jika hash tidak sesuai redirect ke halaman forbidden
        // $user = User::where('username', $request->username)->first();
        $user = User::where('username', $request->username)->first();
        if (!Hash::check($request->password, $user->password, [])) {
            abort(403, 'Invalid credential');
            return view('errors.401');
        }

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('index_login');
    }

    public function index_register()
    {
        return view('auth.register');
    }
}
