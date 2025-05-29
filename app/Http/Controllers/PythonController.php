<?php

namespace App\Http\Controllers;

use App\Services\PythonRunner;

use Illuminate\Http\Request;

class PythonController extends Controller
{
    public function run(Request $request)
    {
        $result = app(\App\Services\PythonRunner::class)->run('echo.py', [
            'laravel_input' => 'Hello from Laravel!'
        ]);
    }
}
