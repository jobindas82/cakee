<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/user/config', [UserController::class, 'saveConfig']);

    Route::middleware(['permission:User-list|User-alter'])->group(function () {
        Route::get('/users/list', [UserController::class, 'list'])->middleware('permission:User-list')->name('users.list');
        Route::middleware(['permission:User-alter'])->group(function () {
            Route::get('/users/create', [UserController::class, 'form'])->name('users.create');
            Route::get('/users/edit/{id}', [UserController::class, 'form'])->name('users.edit');
            Route::post('/users/save', [UserController::class, 'save'])->name('users.save');
        });
    });

    //roles
    Route::middleware(['permission:Roles'])->group(function () {
        Route::get('/roles/list', [RolesController::class, 'list'])->name('roles.list');
        Route::get('/roles/edit/{id}', [RolesController::class, 'form'])->name('roles.edit');
        Route::post('/roles/save', [RolesController::class, 'save'])->name('roles.save');
    });

});

Route::view('/', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard.first');
