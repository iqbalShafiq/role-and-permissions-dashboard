<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();

        return view('permissions.roles.index', compact('roles'));
    }

    public function store(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->create([
            'name' => $request->name,
            'guard_name' => $request->guard ?? 'web',
        ]);

        return back();
    }

    public function edit(Role $role)
    {
        return view('permissions.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $role->update([
            'name' => $request->name,
            'guard_name' => $request->guard ?? 'web'
        ]);

        return redirect()->route('role.index');
    }

    public function delete(Role $role)
    {
        return view('permissions.roles.delete', compact('role'));
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('role.index');
    }
}
