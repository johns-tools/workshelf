<?php

use Illuminate\Support\Facades\Http;

it('returns the blog page', function () {
    Http::fake([
        'https://dev.to/api/articles*' => Http::response([
            [
                'title' => '100APIsOfCode Test Post',
                'published_at' => '2024-01-01T00:00:00Z',
                'tag_list' => ['test'],
                'url' => 'https://dev.to/test',
            ],
        ], 200),
    ]);

    $response = $this->get('/blog');

    $response->assertStatus(200);
    $response->assertSee('100APIsOfCode Test Post');
});
