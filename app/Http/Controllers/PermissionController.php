<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $list_users = User::paginate(20);
        return view('permission.index', compact('user', 'list_users'));
    }

    public function edit(Request $request, User $user)
    {
        $list_permission = Permission::all();
        return view('permission.edit', compact('list_permission', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $user->syncPermissions($request->permission);

        return redirect()->route('permission')->with('success', 'Berhasil update permission.');
    }
}
