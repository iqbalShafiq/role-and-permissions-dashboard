<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class NavigationController extends Controller
{
    public function index()
    {
        $navigations = Navigation::whereNotNull('url')->get();

        return view('permissions.navigation.table', compact('navigations'));
    }

    public function create()
    {
        $permissions = Permission::get();
        $parents = Navigation::where('url', null)->get();

        return view('permissions.navigation.create', compact('permissions', 'parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'permission' => 'required'
        ]);

        Navigation::create([
            'name' => $request->name,
            'url' => $request->url,
            'permission_name' => $request->permission,
            'parent_id' => $request->parent
        ]);

        return back();
    }

    public function edit(Navigation $navigation)
    {
        $parents = Navigation::where('url', null)->get();
        $permissions = Permission::get();

        return view('permissions.navigation.edit', compact('parents', 'navigation', 'permissions'));
    }

    public function update(Request $request, Navigation $navigation)
    {
        $request->validate([
            'name' => 'required',
            'permission' => 'required'
        ]);

        $navigation->update([
            'name' => $request->name,
            'url' => $request->url,
            'permission_name' => $request->permission,
            'parent_id' => $request->parent
        ]);

        return back();
    }

    public function delete(Navigation $navigation)
    {
        return view('permissions.navigation.delete', compact('navigation'));
    }

    public function destroy(Navigation $navigation)
    {
        $navigation->delete();

        return redirect()->route('navigation.table');
    }
}
