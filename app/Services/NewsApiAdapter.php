<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\NewsSourcesInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class NewsApiAdapter implements NewsSourcesInterface
{
    const BASE_URL = 'https://newsapi.org';

    public function getSourcesList(): array
    {
        $requestParams = http_build_query([
            'category' => 'technology',
            'apiKey' => config('services.news_api.key'),
            'language' => 'en',
        ]);

        if (Cache::has('newssources')) {
            return Cache::get('newssources');
        }

        $sources = Http::get(self::BASE_URL . "/v2/top-headlines/sources?{$requestParams}");

        Cache::add('newssources', $sources->collect()->get('sources'), now()->addHour());

        return Cache::get('newssources');
    }

    public function getSourceItems(array $sourceIds): array
    {
        $requestParams = http_build_query([
            'apiKey' => config('services.news_api.key'),
            'sources' => implode(',', $sourceIds),
            'language' => 'en',
        ]);

        $items = Http::get(self::BASE_URL . "/v2/top-headlines?{$requestParams}");
        $cacheKey = implode('_', $sourceIds) . '_items';

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        Cache::add($cacheKey, Arr::get($items->collect()->toArray(), 'articles'), now()->addHour());

        return Cache::get($cacheKey);
    }
}
