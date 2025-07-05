<?php

namespace App\Http\Controllers;

use App\Services\BlogPostService;
use Illuminate\Http\Request;

class BlogAdminController extends Controller
{
    public function __construct(private BlogPostService $blogPostService)
    {
    }

    public function index()
    {
        $posts = $this->blogPostService->all();
        
        return view('blog.admin.index', compact('posts'));
    }

    public function create()
    {
        return view('blog.admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published' => 'boolean',
        ]);

        $post = $this->blogPostService->create($validated);

        return redirect()->route('blog.admin.index')
            ->with('success', 'Blog post created successfully!');
    }

    public function show(string $id)
    {
        $post = $this->blogPostService->find($id);
        
        if (!$post) {
            abort(404);
        }

        return view('blog.admin.show', compact('post'));
    }

    public function edit(string $id)
    {
        $post = $this->blogPostService->find($id);
        
        if (!$post) {
            abort(404);
        }

        return view('blog.admin.edit', compact('post'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published' => 'boolean',
        ]);

        $post = $this->blogPostService->update($id, $validated);

        if (!$post) {
            abort(404);
        }

        return redirect()->route('blog.admin.index')
            ->with('success', 'Blog post updated successfully!');
    }

    public function destroy(string $id)
    {
        $deleted = $this->blogPostService->delete($id);

        if (!$deleted) {
            abort(404);
        }

        return redirect()->route('blog.admin.index')
            ->with('success', 'Blog post deleted successfully!');
    }
}