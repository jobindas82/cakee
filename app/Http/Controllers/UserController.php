<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function list(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.list');
    }

    public function form(int $id = 0): View
    {
        $roles = Role::all()->pluck('name');
        $permissions = Permission::all()->pluck('name');
        return view('users.form', ['user' => $id > 0 ? User::findOrfail($id) : null, 'roles' => $roles, 'permissions' => $permissions]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:40'],
            'roles' => ['required', 'array', 'min:1'],
            'permissions' => ['array'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore((int)request('id'))],
            'password' => ['required_without:id'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active
        ];

        if ((int)request('id') == 0) {
            $data['config'] = [
                "sidebar" => "wide",
                "darkMode" => "light"
            ];
        }

        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $user = User::updateOrCreate(['id' => (int)request('id')], $data);
        $user->markEmailAsVerified();
        $user->syncRoles(request('roles'));
        $user->syncPermissions(request('permissions'));


        return redirect(route('users.list'))->with('success', true);
    }

    public function saveConfig()
    {
        $user = \request()->user();
        $config = $user->config ?? [];
        $config[\request('key')] = \request('value');
        $user->config = $config;
        $user->save();
    }
}
