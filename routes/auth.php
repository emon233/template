<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Web\SigninController as WebSigninController;
use App\Http\Controllers\Auth\Web\SignupController as WebSignupController;

Route::get('/signin', [WebSigninController::class, 'displayForm'])->name('signin');
Route::post('/signin', [WebSigninController::class, 'signin'])->name('signin.post');

Route::get('/signup', [WebSignupController::class, 'displayForm'])->name('signup');
Route::post('/signup', [WebSignupController::class, 'signup'])->name('signup.post');

Route::post('/signout', [WebSigninController::class, 'signout'])->name('signout');
