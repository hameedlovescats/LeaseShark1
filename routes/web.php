<?php

use App\Http\Controllers\PropertyController;
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

        Route::get('/propertiesoption', [AdminController::class, 'index'])->name('admin.property.option');
        Route::get('property/create', [PropertyController::class, 'index'])->name('admin.property.create');
        Route::post('property/store', [PropertyController::class, 'store'])->name('admin.property.store');
        Route::get('property', [PropertyController::class, 'show'])->name('admin.property.show');
        Route::get('property/{id}/update', [PropertyController::class, 'edit'])->name('admin.property.edit');
        Route::put('property/update/{property}', [PropertyController::class, 'update'])->name('admin.property.update');
        Route::delete('property/{property}/delete', [PropertyController::class, 'destroy'])->name('admin.property.delete');
    });

});
