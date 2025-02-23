<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function applicationLanding()
    {
        return view('login_landing_page');
    }

    public function adminDashboard()
    {
        return view('admin_dashboard');
    }

    public function login() // Middleware check needed here.
    {
       return redirect()->route('admin.dashboard');
    }
}
