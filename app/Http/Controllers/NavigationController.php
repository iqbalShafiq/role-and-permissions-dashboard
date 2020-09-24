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
}
