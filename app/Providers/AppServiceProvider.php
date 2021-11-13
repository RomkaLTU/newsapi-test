<?php

namespace App\Providers;

use App\Interfaces\NewsSourcesInterface;
use App\Services\NewsApiAdapter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(NewsSourcesInterface::class, function($app) {
            return match ($app->make('config')->get('services.news_privider')) {
                'news-api' => new NewsApiAdapter(),
                default => throw new \RuntimeException('Unknown News provider service'),
            };
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
