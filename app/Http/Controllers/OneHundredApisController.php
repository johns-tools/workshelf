<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OneHundredApisController extends Controller
{
    public function home(Request $request)
    {
        return view('one_hundred_apis');
    }
}
