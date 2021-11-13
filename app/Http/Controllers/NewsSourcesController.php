<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\NewsSourcesInterface;
use Inertia\Inertia;
use Inertia\Response;

class NewsSourcesController extends Controller
{
    public function __construct(
        private NewsSourcesInterface $newsSources,
    ) {}

    public function index(): Response
    {
        return Inertia::render('NewsSources/Index', [
            'sources' => $this->newsSources->getSourcesList(),
        ]);
    }

    public function show(string $id): Response
    {
        return Inertia::render('NewsSources/NewsList', [
            'headlines' => $this->newsSources->getSourceItems(
                sourceIds: [$id],
            ),
        ]);
    }
}
