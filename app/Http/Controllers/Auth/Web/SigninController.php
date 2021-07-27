<?php

namespace App\Http\Controllers\Auth\Web;

use Auth;
use App\Http\Controllers\WebController as BaseController;
use App\Http\Requests\Auth\SigninPhoneRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\SigninRequest;

class SigninController extends BaseController
{
    public function displayForm()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }
        return view('auth.signin');
    }

    public function displayPhoneForm()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('auth.phone-signin');
    }

    public function signinPhone(SigninPhoneRequest $request)
    {
        $credentials = $request->only('phone_no', 'password');

        if (Auth::guard('web')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->route('home');
        }

        return redirect()->back();
    }

    public function signin(SigninRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->route('home');
        }

        return redirect()->back();
    }

    /**
     * Redirect back after a failed login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function signinFailed()
    {
        return ['status' => false, 'message' => 'Credentials do not match our records'];
    }

    /**
     * Logout the Student.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function signout()
    {
        Auth::guard('web')->logout();

        return redirect()
            ->route('welcome')
            ->with('status', 'User has been logged out!');
    }
}
