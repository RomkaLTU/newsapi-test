<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\NewsSourcesService;
use Illuminate\Support\Arr;
use Inertia\Inertia;
use Inertia\Response;

class NewsSourcesController extends Controller
{
    public function __construct(
        public NewsSourcesService $newsSourcesService
    ) {}

    public function index(): Response
    {
        return Inertia::render('NewsSources/Index', [
            'sources' => Arr::get($this->newsSourcesService->getNewsSources(), 'sources'),
        ]);
    }
}
