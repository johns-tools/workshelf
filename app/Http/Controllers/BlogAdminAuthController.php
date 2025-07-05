<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BlogAdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('blog.admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $adminPassword = env('BLOG_ADMIN_PASSWORD', 'admin123');

        if (Hash::check($request->password, Hash::make($adminPassword)) || $request->password === $adminPassword) {
            $request->session()->put('blog_admin_authenticated', true);
            return redirect()->route('blog.admin.index');
        }

        return back()->withErrors(['password' => 'Invalid password'])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->forget('blog_admin_authenticated');
        return redirect()->route('blog.admin.login')->with('success', 'Logged out successfully');
    }
}