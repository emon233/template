<?php

namespace App\Http\Controllers\Auth\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\SignupRequest;

class SignupController extends Controller
{
    public function displayForm()
    {
        return view('auth.signup');
    }

    public function signin(SigninRequest $request)
    {
        //
    }
}
