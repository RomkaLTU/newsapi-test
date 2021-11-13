<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\NewsApi\NewsProviderItemDTO;
use App\DTO\NewsApi\SourceListItemDTO;
use App\Interfaces\NewsSourcesInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class NewsApiAdapter implements NewsSourcesInterface
{
    const BASE_URL = 'https://newsapi.org';

    public function getSourcesList(): array
    {
        if (Cache::has('newssources')) {
            return Cache::get('newssources');
        }

        $this->setSourceListCache();

        return Cache::get('newssources');
    }

    public function getFavoriteSources(?array $sourceIds): array
    {
        if (!$sourceIds) {
            return [];
        }

        if (!Cache::has('newssources')) {
            $this->setSourceListCache();
        }

        return array_values(array_filter(
            Cache::get('newssources'),
            fn($item) => in_array($item['id'], $sourceIds)
        ));
    }

    public function getSourceItems(?array $sourceIds): array
    {
        if (!$sourceIds) {
            return [];
        }

        $requestParams = http_build_query([
            'apiKey' => config('services.news_api.key'),
            'sources' => implode(',', $sourceIds),
            'language' => 'en',
        ]);

        $cacheKey = implode('_', $sourceIds) . '_items';

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $items = Http::get(self::BASE_URL . "/v2/top-headlines?{$requestParams}");
        $cachableData = [];

        foreach ($items->collect()->get('articles') as $item) {
            $cachableData[] = (new NewsProviderItemDTO($item))->toArray();
        }

        Cache::add($cacheKey, $cachableData, now()->addHour());

        return Cache::get($cacheKey);
    }

    private function setSourceListCache()
    {
        $requestParams = http_build_query([
            'category' => 'technology',
            'apiKey' => config('services.news_api.key'),
            'language' => 'en',
        ]);

        $items = Http::get(self::BASE_URL . "/v2/top-headlines/sources?{$requestParams}");
        $cachableData = [];

        foreach ($items->collect()->get('sources') as $item) {
            $cachableData[] = (new SourceListItemDTO($item))->toArray();
        }

        Cache::add('newssources', $cachableData, now()->addHour());
    }
}
