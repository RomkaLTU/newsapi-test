<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsSourcesController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'verified'],
], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/sources', [NewsSourcesController::class, 'index'])->name('sources');
    Route::get('/sources/{id}', [NewsSourcesController::class, 'show'])->name('sources.newslist');
});

require __DIR__.'/auth.php';
