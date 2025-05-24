<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function applicationLanding()
    {
        //
        $data = ["one", "two", "three"];
        return view('login_landing_page',compact('data'));
    }

    public function adminDashboard()
    {

        MessageSent::dispatch("Test 123");
        return response()->json(['status' => 'Message sent']);
        //return view('admin_dashboard');
    }

    public function login() // Middleware check needed here.
    {
       return redirect()->route('admin.dashboard');
    }
}
