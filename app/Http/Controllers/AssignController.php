<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignController extends Controller
{
    public function create()
    {
        return view('permissions.assign.create', [
            'roles' => Role::get(),
            'permissions' => Permission::get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'permissions' => 'array|required'
        ]);


        $role = Role::find($request->role);
        // dd($request->role);
        $role->givePermissionTo($request->permissions);

        return back()->with('success', 'Permissions have been assigned.');
    }

    public function edit(Role $role)
    {
        return view('permissions.assign.edit', [
            'role' => $role,
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        $role->syncPermissions($request->permissions);

        return back()->with('success', 'The role has been asynced');
    }
}
