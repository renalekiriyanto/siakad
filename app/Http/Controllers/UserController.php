<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(10);
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();

        return view('User.index', compact('data', 'profile', 'user'));
    }
}
