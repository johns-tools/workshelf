<?php

// app/Providers/RateLimitServiceProvider.php
namespace App\Providers;

use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class RateLimitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Global baseline – 60 req/min per IP
        RateLimiter::for('global', fn () => Limit::perMinute(60));

        // Tighter login limiter – 5 req/min per user/email/IP
        RateLimiter::for('login', fn (Request $r) =>
            Limit::perMinute(5)->by($r->input('email') ?: $r->ip())
        );

        // Per-second burst control – 1 req/sec per IP
        RateLimiter::for('burst', fn (Request $r) =>
            Limit::perSecond(1)->by($r->ip())          // Laravel 11 new helper
        );
    }
}

