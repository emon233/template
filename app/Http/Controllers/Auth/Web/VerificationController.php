<?php

namespace App\Http\Controllers\Auth\Web;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function displayVerificationNotice()
    {
        Session::flash('notice', __('auth.verify.notice'));

        return view('auth.verification-notice');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function resendVerificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        Session::flash('resend', __('auth.verify.notice.resend'));

        return view('auth.verification-notice');
    }

    /**
     * Undocumented function
     *
     * @param EmailVerificationRequest $request
     * @return void
     */
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('home');
    }
}
