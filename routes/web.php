<?php

use App\Http\Controllers\AssignController;
use App\Http\Controllers\NavigationController;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    // $role = Role::find(2);
    // $role->givePermissionTo('create category', 'create user');
    return view('welcome');
});

Auth::routes();

Route::middleware('has.role')->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::prefix('role-and-permission')->group(function () {
        Route::prefix('roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('role.index');
            Route::post('create', [RoleController::class, 'store'])->name('role.store');
            Route::get('{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
            Route::put('{role}/edit', [RoleController::class, 'update'])->name('role.update');
            Route::get('{role}/delete', [RoleController::class, 'delete'])->name('role.delete');
            Route::delete('{role}/delete', [RoleController::class, 'destroy'])->name('role.destroy');
        });

        Route::prefix('permissions')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
            Route::post('create', [PermissionController::class, 'store'])->name('permission.store');
            Route::get('{permission}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
            Route::put('{permission}/edit', [PermissionController::class, 'update'])->name('permission.update');
            Route::get('{permission}/delete', [PermissionController::class, 'delete'])->name('permission.delete');
            Route::delete('{permission}/delete', [PermissionController::class, 'destroy'])->name('permission.destroy');
        });

        Route::get('assign-permissions', [AssignController::class, 'create'])->name('assign.create');
        Route::post('assign-permissions', [AssignController::class, 'store'])->name('assign.store');
        Route::get('assign-permissions/{role}/asyinc', [AssignController::class, 'edit'])->name('assign.edit');
        Route::put('assign-permissions/{role}/asyinc', [AssignController::class, 'update'])->name('assign.update');

        Route::get('assign-roles/users', [UserController::class, 'create'])->name('assign.user.create');
        Route::post('assign-roles/users', [UserController::class, 'store']);
        Route::get('assign-roles/{user}/edit', [UserController::class, 'edit'])->name('assign.user.edit');
        Route::put('assign-roles/{user}/edit', [UserController::class, 'update']);
    });
    Route::prefix('navigations')->middleware('permission: create navigation')->group(function () {
        Route::get('create', [NavigationController::class, 'create'])->name('navigation.create');
        Route::post('create', [NavigationController::class, 'store']);
        Route::get('table', [NavigationController::class, 'index'])->name('navigation.table');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
