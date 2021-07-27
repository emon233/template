<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function success($message = null)
    {
        if ($message != null) Session::flash('success', $message);
    }

    public function error($message = null)
    {
        if ($message != null) {
            Session::flash('error', $message);
        }
    }

    public function errorEx($error = null)
    {
        if ($error != null) {
            Log::error($error);
            Session::flash('error', __('error.exception'));
        }
    }
}
