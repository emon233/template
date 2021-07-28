<?php

namespace App\Http\Controllers\Auth\Web;

use Log;
use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Password\EmailRequest;
use App\Http\Requests\Auth\Password\PasswordResetRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function displayEmailForm()
    {
        return view('auth.password.reset');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function sendResetLink(EmailRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        $status === Password::RESET_LINK_SENT
            ? Session::flash('success', __($status))
            : Session::flash('error', __($status));

        return view('auth.password.message');
    }

    /**
     * Undocumented function
     *
     * @param [type] $token
     * @return void
     */
    public function displayResetPasswordForm($token)
    {
        return view('auth.password.update', compact('token'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function resetPassword(PasswordResetRequest $request)
    {
        try {
            $status = Password::reset(
                $request->only('email', 'password', 'c_password', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $user->save();

                    event(new PasswordReset($user));
                }
            );

            if ($status == Password::PASSWORD_RESET) {
                Session::flash('success', __('passwords.reset.success'));
                return redirect()->route('signin');
            } else {
                Session::flash('error', __('passwords.reset.error'));
                return redirect()->back();
            }
        } catch (\Exception $ex) {
            Session::flash('error', __('passwords.reset.error'));
            Log::error($ex->getMessage());
            return redirect()->back();
        }
    }
}
