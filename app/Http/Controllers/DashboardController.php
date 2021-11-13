<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Interfaces\NewsSourcesInterface;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __construct(
        private NewsSourcesInterface $newsSources,
    ) {}

    public function index(): Response
    {
        $userFavorites = json_decode(auth()->user()->favorites);

        return Inertia::render('Dashboard', [
            'sources' => $this->newsSources->getFavoriteSources($userFavorites),
        ]);
    }
}
