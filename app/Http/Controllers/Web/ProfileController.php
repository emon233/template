<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display Profile Page
     *
     * @return void
     */
    public function index()
    {
        if(auth()->user()->role->has_admin_access) {
            return view('admin.profile.index');
        }

        return redirect()->route('welcome');
    }
}
