<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Web\Admin\UserController;
use App\Http\Controllers\Web\ProfileController as WebProfileController;

Route::prefix('/admin')->name('admin.')->middleware('admin')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('dashboard');

    Route::prefix('/profile')->name('profile.')->group(function () {
        Route::get('/index', [WebProfileController::class, 'index'])->name('index');
        Route::put('/update', [WebProfileController::class, 'update'])->name('update');
        Route::put('/update/email', [WebProfileController::class, 'updateEmail'])->name('update.email');
        Route::put('/update/phone', [WebProfileController::class, 'updatePhone'])->name('update.phone');
        Route::put('/update/password', [WebProfileController::class, 'updatePassword'])->name('update.password');
    });

    Route::prefix('/users')->name('users.')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/show/{user}', [UserController::class, 'show'])->name('show');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('delete');
    });
});
