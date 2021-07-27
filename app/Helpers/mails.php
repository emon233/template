<?php

use App\Mail\System\UserSignup;

const EMAIL_SIGNUP_REPORT = "sazid.hossain.1433@gmail.com";
const EMAIL_ERROR_REPORT = "sazid.hossain.1433@gmail.com";

const EMAIL_FROM = "system@personal.adminlte31.local";

const SITE_URL = "http://personal.adminlte31.local/";
const SITE_URL_SIGNIN = SITE_URL . "signin";
const SITE_URL_LOG = SITE_URL . "logs";


function sendSignupMail($user)
{
    try {
        return Mail::to(EMAIL_SIGNUP_REPORT)->send(new UserSignup($user));
    } catch (\Exception $ex) {
        return false;
    }
}
