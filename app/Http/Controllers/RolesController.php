<?php

namespace App\Http\Controllers;

use App\DataTables\RolesDataTable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function list(RolesDataTable $dataTable)
    {
        return $dataTable->render('users.roles-list');
    }

    public function form(int $id, Request $request)
    {
        $permissions = Permission::all()->pluck('name')->toArray();
        return view('users.roles-form', ['role' => Role::findOrfail($id), 'permissions' => $permissions]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'permissions' => ['required', 'array', 'min:1']
        ]);

        $role = Role::findOrfail($request->id);
        $role->syncPermissions($request->permissions);

        return redirect(route('roles.list'))->with('success', true);
    }
}
