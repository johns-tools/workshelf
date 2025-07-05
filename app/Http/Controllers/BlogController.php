<?php

namespace App\Http\Controllers;

use App\Services\DevToService;
use App\Services\BlogPostService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $devToArticles = app(DevToService::class)
            ->getSeriesArticles('johns-dev-projects', '100APIsOfCode');

        $localPosts = app(BlogPostService::class)->getPublished();

        // Convert local posts to same format as Dev.to articles
        $localArticles = collect($localPosts)->map(function ($post) {
            return [
                'title' => $post['title'],
                'published_at' => $post['created_at'],
                'tag_list' => ['local'],
                'url' => route('blog.admin.show', $post['id']),
            ];
        })->all();

        // Combine and sort by date
        $allArticles = collect(array_merge($devToArticles, $localArticles))
            ->sortByDesc('published_at')
            ->values()
            ->all();

        return view('blog', [
            'articles' => $allArticles,
        ]);
    }
}
