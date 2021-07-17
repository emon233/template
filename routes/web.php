<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\ProfileController as WebProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

include('auth.php');

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [HomeController::class, 'adminDashboard'])->name('dashboard');


    Route::prefix('/profile')->name('profile.')->group(function() {
        Route::get('/index', [WebProfileController::class, 'index'])->name('index');
    });
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
