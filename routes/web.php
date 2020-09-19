<?php

use App\Http\Controllers\AssignController;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

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
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
