<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\System\AccessController as AccessController;
use App\Http\Controllers\Web\System\AccessRoleController as AccessRoleController;
use App\Http\Controllers\Web\System\RoleController as RoleController;


use App\Http\Controllers\Web\ProfileController as WebProfileController;
use App\Http\Controllers\Auth\Web\SigninController as WebSigninController;
use App\Http\Controllers\Auth\Web\SignupController as WebSignupController;

Route::get('/signin', [WebSigninController::class, 'displayForm'])->name('signin');
Route::post('/signin', [WebSigninController::class, 'signin'])->name('signin.post');

Route::get('/signup', [WebSignupController::class, 'displayForm'])->name('signup');
Route::post('/signup', [WebSignupController::class, 'signup'])->name('signup.post');

Route::post('/signout', [WebSigninController::class, 'signout'])->name('signout');

Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('dashboard');

    Route::prefix('/profile')->name('profile.')->group(function () {
        Route::get('/index', [WebProfileController::class, 'index'])->name('index');
        Route::put('/update', [WebProfileController::class, 'update'])->name('update');
        Route::put('/update/email', [WebProfileController::class, 'updateEmail'])->name('update.email');
        Route::put('/update/phone', [WebProfileController::class, 'updatePhone'])->name('update.phone');
        Route::put('/update/password', [WebProfileController::class, 'updatePassword'])->name('update.password');
    });
});

Route::prefix('/system')->name('system.')->middleware('system')->group(function () {
    Route::prefix('/roles')->name('roles.')->group(function () {
        Route::get('/index', [RoleController::class, 'index'])->name('index');
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        Route::post('/store', [RoleController::class, 'store'])->name('store');
        Route::get('/show/{role}', [RoleController::class, 'show'])->name('show');
        Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('edit');
        Route::put('/update/{role}', [RoleController::class, 'update'])->name('update');
        Route::delete('/delete/{role}', [RoleController::class, 'delete'])->name('delete');

        Route::prefix('/accesses')->name('accesses.')->group(function() {
            Route::get('/index/{role}', [AccessRoleController::class, 'index'])->name('index');
            Route::post('/store/{role}', [AccessRoleController::class, 'store'])->name('store');
        });
    });

    Route::prefix('/accesses')->name('accesses.')->group(function () {
        Route::get('/index', [AccessController::class, 'index'])->name('index');
        // Route::get('/create', [AccessController::class, 'create'])->name('create');
        // Route::post('/store', [AccessController::class, 'store'])->name('store');
        // Route::get('/show/{access}', [AccessController::class, 'show'])->name('show');
        // Route::get('/edit/{access}', [AccessController::class, 'edit'])->name('edit');
        // Route::put('/update/{access}', [AccessController::class, 'update'])->name('update');
        // Route::delete('/delete/{access}', [AccessController::class, 'delete'])->name('delete');
        Route::get('/auto-update', [AccessController::class, 'auto'])->name('auto');
    });
});
