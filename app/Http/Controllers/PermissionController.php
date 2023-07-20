<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    // Permission
    public function index()
    {
        $list_permission = Permission::paginate(20);
        return view('permission.index', compact('list_permission'));
    }

    public function tambah()
    {
        $tables = Schema::getAllTables();
        return view('permission.tambah', compact('tables'));
    }

    public function store(Request $request)
    {
        if ($request->crud) {
            $crud = [
                [
                    'name' => 'list ' . $request->name
                ],
                [
                    'name' => 'detail ' . $request->name
                ],
                [
                    'name' => 'tambah ' . $request->name
                ],
                [
                    'name' => 'edit ' . $request->name
                ],
                [
                    'name' => 'delete ' . $request->name
                ]
            ];
            foreach ($crud as $item) {
                $permission = Permission::where('name', $request->name)->first();
                if ($permission) {
                    return redirect()->route('permission')->with('warning', 'Permission sudah ada.');
                }

                $permission = Permission::create([
                    'name' => $item['name'],
                    'guard_name' => 'web'
                ]);
            }
        } else {
            $permission = Permission::where('name', $request->name)->first();

            if ($permission) {
                return redirect()->route('permission')->with('warning', 'Permission sudah ada.');
            }

            $permission = Permission::create([
                'name' => $request->name,
                'guard_name' => 'web'
            ]);
        }

        return redirect()->route('permission')->with('success', 'Berhasil tambah permission.');
    }

    public function delete(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permission')->with('success', 'Berhasil hapus permission.');
    }

    // Permision User
    public function index_user()
    {
        $user = Auth::user();
        $list_users = User::paginate(20);
        return view('permission.index_user', compact('user', 'list_users'));
    }

    public function edit_user(Request $request, User $user)
    {
        $list_permission = Permission::all();
        return view('permission.edit_user', compact('list_permission', 'user'));
    }

    public function update_user(Request $request, User $user)
    {
        $user->syncPermissions($request->permission);

        return redirect()->route('permission_user')->with('success', 'Berhasil update permission.');
    }
}
