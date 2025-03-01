<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function applicationLanding()
    {
        $data = ["one", "two", "three"];
        return view('login_landing_page',compact('data'));
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
