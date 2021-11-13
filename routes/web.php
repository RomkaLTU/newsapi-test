<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsSourceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'verified'],
], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/sources', [NewsSourceController::class, 'index'])->name('sources');
    Route::get('/sources/{id}', [NewsSourceController::class, 'show'])->name('sources.newslist');

    Route::put('/users/favorites', [UserController::class, 'updateFavorites'])->name('users.favorites');
});

require __DIR__.'/auth.php';
