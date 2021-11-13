<?php

declare(strict_types=1);

namespace App\DTO\NewsApi;

use Illuminate\Support\Arr;

class SourceListItemDTO
{
    public function __construct(
        private array $dataRaw
    ) {}

    public function getId(): ?string
    {
        return Arr::get($this->dataRaw, 'id');
    }

    public function getName(): ?string
    {
        return Arr::get($this->dataRaw, 'name');
    }

    public function getDescription(): ?string
    {
        return Arr::get($this->dataRaw, 'description');
    }

    public function getUrl(): ?string
    {
        return Arr::get($this->dataRaw, 'url');
    }

    public function getCategory(): ?string
    {
        return Arr::get($this->dataRaw, 'category');
    }

    public function getLanguage(): ?string
    {
        return Arr::get($this->dataRaw, 'language');
    }

    public function getCountry(): ?string
    {
        return Arr::get($this->dataRaw, 'country');
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'url' => $this->getUrl(),
            'category' => $this->getCategory(),
            'language' => $this->getLanguage(),
            'country' => $this->getCountry(),
        ];
    }
}
