<?php

namespace App\DTO\NewsApi;

use Carbon\Carbon;
use Illuminate\Support\Arr;

class NewsProviderItemDTO
{
    public function __construct(
        private array $dataRaw
    ) {}

    public function getTitle(): ?string
    {
        return Arr::get($this->dataRaw, 'title');
    }

    public function getAuthor(): ?string
    {
        return Arr::get($this->dataRaw, 'author');
    }

    public function getContent(): ?string
    {
        return Arr::get($this->dataRaw, 'content');
    }

    public function getDescription(): ?string
    {
        return Arr::get($this->dataRaw, 'description');
    }

    public function getPublishDate(): string
    {
        $dateRaw = Arr::get($this->dataRaw, 'publishedAt');

        return Carbon::make($dateRaw)->format('Y-m-d H:i');
    }

    public function getSource(): array
    {
        return [
            'id' => Arr::get($this->dataRaw, 'source.id'),
            'name' => Arr::get($this->dataRaw, 'source.name'),
        ];
    }

    public function getUrl(): ?string
    {
        return Arr::get($this->dataRaw, 'url');
    }

    public function getImageUrl(): ?string
    {
        return Arr::get($this->dataRaw, 'urlToImage');
    }

    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'author' => $this->getAuthor(),
            'content' => $this->getContent(),
            'description' => $this->getDescription(),
            'publishDate' => $this->getPublishDate(),
            'source' => $this->getSource(),
            'url' => $this->getUrl(),
            'imageUrl' => $this->getImageUrl(),
        ];
    }
}
