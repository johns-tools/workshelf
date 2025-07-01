<?php

use App\Services\DevToService;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use Illuminate\Container\Container;
use Illuminate\Http\Client\Factory;

beforeEach(function () {
    // Minimal container setup so the Http facade can be used without the full framework
    $container = new Container();
    $container->instance('http', new Factory());
    Facade::setFacadeApplication($container);
});

it('returns filtered articles when response is successful', function () {
    Http::fake([
        'https://dev.to/api/articles*' => Http::response([
            [
                'title' => 'Laravel Series: Introduction',
                'published_at' => '2024-01-01',
                'tag_list' => ['laravel'],
                'url' => 'https://dev.to/1',
            ],
            [
                'title' => 'Another Article',
                'published_at' => '2024-01-02',
                'tag_list' => ['php'],
                'url' => 'https://dev.to/2',
            ],
        ], 200),
    ]);

    $service = new DevToService();
    $articles = $service->getSeriesArticles('user', 'Laravel Series');

    expect($articles)->toHaveCount(1)
        ->and($articles[0]['title'])->toBe('Laravel Series: Introduction');
});

it('returns empty array when request fails', function () {
    Http::fake([
        'https://dev.to/api/articles*' => Http::response([], 500),
    ]);

    $service = new DevToService();
    $articles = $service->getSeriesArticles('user', 'Laravel Series');

    expect($articles)->toBeArray()->toBeEmpty();
});
