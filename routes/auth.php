<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\ProfileController as WebProfileController;
use App\Http\Controllers\Auth\Web\SigninController as WebSigninController;
use App\Http\Controllers\Auth\Web\SignupController as WebSignupController;
use App\Http\Controllers\Auth\Web\VerificationController as WebVerificationController;



Route::get('/signin', [WebSigninController::class, 'displayForm'])->name('signin');
Route::post('/signin', [WebSigninController::class, 'signin'])->name('signin.post');

Route::get('/signin-phone-no', [WebSigninController::class, 'displayPhoneForm'])->name('signin.phone');
Route::post('/signin-phone-no', [WebSigninController::class, 'signinPhone'])->name('signin.phone.post');

Route::get('/signup', [WebSignupController::class, 'displayForm'])->name('signup');
Route::post('/signup', [WebSignupController::class, 'signup'])->name('signup.post');


Route::middleware(['auth'])->group(function () {
    Route::get('/verification-notice', [WebVerificationController::class, 'displayVerificationNotice'])->name('verification.notice');
    Route::post('/email/verification-notification', [WebVerificationController::class, 'resendVerificationEmail'])->middleware('throttle:6,1')->name('verification.send');

    Route::get('/email/verify/{id}/{hash}', [WebVerificationController::class, 'verifyEmail'])->middleware('signed')->name('verification.verify');

    Route::post('/signout', [WebSigninController::class, 'signout'])->name('signout');
});
