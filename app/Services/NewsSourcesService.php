<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class NewsSourcesService
{
    public function getNewsSources(): array
    {
        $requestParams = http_build_query([
            'category' => 'technology',
            'apiKey' => config('services.news_api.key'),
            'language' => 'en',
        ]);

        if (Cache::has('newssources')) {
            return Cache::get('newssources');
        }

        $sources = Http::get("https://newsapi.org/v2/top-headlines/sources?{$requestParams}");

        Cache::add('newssources', $sources->collect()->toArray(), now()->addHour());

        return $sources->collect()->toArray();
    }
}
