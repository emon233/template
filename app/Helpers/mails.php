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

const SITE_LOGO_MAIL = "assets/adminLte/dist/img/AdminLTELogo.png";

/** Allowed Mail Constants */

const ALLOWED_MAILS = true;

/** Mails sendable to system admin */
const ALLOW_MAIL_SYSTEM_EXCEPTION = ALLOWED_MAILS ? true : false;

/** Mails sendable to site admins */
const ALLOW_MAIL_SYSTEM_SIGNUP = ALLOWED_MAILS ? true : false;

/** Mails sendable to site users */
const ALLOW_MAIL_USER_WELCOME = ALLOWED_MAILS ? false : false;
const ALLOW_MAIL_USER_SIGNIN = ALLOWED_MAILS ? true : false;

/** End Allowed Mail Constants */
