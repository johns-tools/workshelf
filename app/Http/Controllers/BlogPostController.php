<?php

namespace App\Http\Controllers;

use App\Services\BlogPostService;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function __construct(private BlogPostService $blogPostService)
    {
    }

    public function show(string $id)
    {
        $post = $this->blogPostService->find($id);
        
        if (!$post || !$post['published']) {
            abort(404);
        }

        return view('blog.post', compact('post'));
    }
}