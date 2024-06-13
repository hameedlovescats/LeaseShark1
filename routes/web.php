<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Admin Access Only
Route::middleware(['auth','admin'])->group(function () {
    Route::prefix('admin')->group(function (){
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.user');
        Route::get('users/{id}/update', [AdminController::class, 'updateUser'])->name('admin.user.edit');
        Route::put('users/update/{id}', [AdminController::class, 'updateUserSubmit'])->name('admin.user.update');
        Route::delete('users/{user}/delete', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
    });
});
