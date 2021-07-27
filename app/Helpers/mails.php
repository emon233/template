<?php

use App\Mail\System\UserSignup;
use App\Mail\User\Welcome;

use Illuminate\Support\Facades\Log;

const EMAIL_SIGNUP_REPORT = "sazid.hossain.1433@gmail.com";
const EMAIL_ERROR_REPORT = "sazid.hossain.1433@gmail.com";

const EMAIL_FROM = "system@personal.adminlte31.local";

const SITE_URL = "http://personal.adminlte31.local/";
const SITE_URL_SIGNIN = SITE_URL . "signin";
const SITE_URL_LOG = SITE_URL . "logs";


/**
 * Save Mail Error To Log
 *
 * @param [type] $message
 * @return void
 */
function mailError($message = null)
{
    if (!is_null($message)) {
        Log::error($message);
    }
}

/**
 * Send Signup Notification Mail to Admin
 *
 * @param [type] $user
 * @return void
 */
function sendSignupMail($user)
{
    try {
        return Mail::to(EMAIL_SIGNUP_REPORT)->send(new UserSignup($user));
    } catch (\Exception $ex) {
        mailError($ex->getMessage());
        return false;
    }
}

/**
 * Send Welcome Mail to User
 *
 * @param [type] $user
 * @return void
 */
function sendWelcomeMail($user)
{
    try {
        return Mail::to($user->email)->send(new Welcome);
    } catch (\Exception $ex) {
        mailError($ex->getMessage());
        return false;
    }
}
