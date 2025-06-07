<?php

namespace App\Http\Controllers;

use App\Services\DevToService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $articles = app(DevToService::class)
            ->getSeriesArticles('johns-dev-projects', '100APIsOfCode');

        return view('blog', [
            'articles' => $articles,
        ]);
    }
}
