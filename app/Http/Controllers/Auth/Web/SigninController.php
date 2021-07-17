<?php

namespace App\Http\Controllers\Auth\Web;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\SigninRequest;

class SigninController extends Controller
{
    public function displayForm()
    {
        if(auth()->check()) {
            return redirect()->route('home');
        }
        return view('auth.signin');
    }

    public function signin(SigninRequest $request)
    {
        $credentials = $this->credentials($request);

        if(Auth::guard('web')->attempt($credentials, $request->filled('remember'))){
            return redirect()->route('home');
        }

        return redirect()->back();
    }

    /**
     * Make Credential
     *
     * @param \Illuminate\Http\Request
     * @return $credentials
     */
    protected function credentials(Request $request)
    {
        $credentials = $request->only('email', 'password');
        //$credentials['status'] = 1;

        return $credentials;
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
            ->with('status','User has been logged out!');
    }
}
