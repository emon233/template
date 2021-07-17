<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        if(auth()->check() && auth()->user()->role->has_admin_access) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('welcome');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function adminDashboard()
    {
        return view('admin');
    }
}
