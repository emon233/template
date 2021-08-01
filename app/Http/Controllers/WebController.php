<?php

namespace App\Http\Controllers;

use Log;
use Session;
use Illuminate\Http\Request;

use App\Jobs\System\ExceptionEmailJob;

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
            ExceptionEmailJob::dispatch($error)->onQueue(QUEUE_EXCEPTION);
            Log::error($error);
            Session::flash('error', __('error.exception'));
        }
    }
}
