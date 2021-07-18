<?php

namespace App\Http\Controllers;

use Log;
use Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($message = null)
    {
        if($message != null) Session::flash('success', $message);
    }

    public function error($message = null)
    {
        if($message != null) {
            Session::flash('error', $message);
        }
    }

    public function errorEx($error = null)
    {
        if($error != null) {
            Log::error($error);
            Session::flash('error', __('error.exception'));
        }
    }
}
