<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::get();
        $users = User::has('roles')->get();

        return view('permissions.assign.user.create', compact('roles', 'users'));
    }

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->assignRole($request->roles);

        return back();
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        return view('permissions.assign.user.edit', compact('roles', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $user->syncRoles($request->roles);
        // return redirect()->route('assign.user.create');
        return back();
    }
}
