<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();

        return view('permissions.permission.index', compact('permissions'));
    }

    public function store(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $permission->create([
            'name' => $request->name,
            'guard_name' => $request->guard ?? 'web',
        ]);

        return back();
    }

    public function edit(Permission $permission)
    {
        return view('permissions.permission.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $permission->update([
            'name' => $request->name,
            'guard_name' => $request->guard ?? 'web'
        ]);

        return redirect()->route('permission.index');
    }

    public function delete(permission $permission)
    {
        return view('permissions.permission.delete', compact('permission'));
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permission.index');
    }
}
