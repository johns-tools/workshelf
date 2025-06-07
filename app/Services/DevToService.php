<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DevToService
{
    /**
     * Fetch articles for a user and filter by title prefix.
     */
    public function getSeriesArticles(string $username, string $seriesPrefix): array
    {
        $response = Http::get('https://dev.to/api/articles', [
            'username' => $username,
        ]);

        if (!$response->successful()) {
            return [];
        }

        $articles = $response->json();

        return collect($articles)
            ->filter(fn ($article) => Str::startsWith($article['title'] ?? '', $seriesPrefix))
            ->map(fn ($article) => [
                'title' => $article['title'],
                'published_at' => $article['published_at'],
                'tags' => $article['tag_list'] ?? [],
                'url' => $article['url'],
            ])
            ->values()
            ->all();
    }
}
