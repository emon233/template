<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\UserSignup;

use Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\WebController as BaseController;
use App\Models\User;

class HomeController extends BaseController
{
    public function home()
    {
        if (auth()->check() && auth()->user()->role->has_admin_access) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('welcome');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
}
