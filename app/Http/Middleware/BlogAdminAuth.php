<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogAdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated for blog admin
        if (!$request->session()->get('blog_admin_authenticated', false)) {
            return redirect()->route('blog.admin.login');
        }

        return $next($request);
    }
}