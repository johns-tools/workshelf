<?php

namespace App\Http\Controllers;

use App\Services\DevToService;
use App\Services\BlogPostService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $localPosts = app(BlogPostService::class)->getPublished();

        // Convert local posts to same format as Dev.to articles
        $localArticles = collect($localPosts)->map(function ($post) {
            return [
                'title' => $post['title'],
                'published_at' => $post['created_at'],
                'tag_list' => ['local'],
                'url' => route('blog.post.show', $post['id']),
                'content_preview' => $this->getContentPreview($post['content']),
            ];
        })->all();

        // Combine and sort by date
        $allArticles = collect($localArticles)
            ->sortByDesc('published_at')
            ->values()
            ->all();

        return view('blog', [
            'articles' => $allArticles,
        ]);
    }

    private function getContentPreview(string $content, int $wordLimit = 30): string
    {
        $words = str_word_count($content, 2);
        $limitedWords = array_slice($words, 0, $wordLimit, true);
        
        if (count($words) > $wordLimit) {
            return implode(' ', $limitedWords) . '...';
        }
        
        return $content;
    }
}
