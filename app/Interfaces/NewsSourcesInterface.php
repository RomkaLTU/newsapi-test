<?php

declare(strict_types=1);

namespace App\Interfaces;

interface NewsSourcesInterface
{
    public function getSourcesList(): array;

    public function getSourceItems(?array $sourceIds): array;

    public function getFavoriteSources(?array $sourceIds): array;
}
