<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UserFavoriteRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function updateFavorites(UserFavoriteRequest $request): RedirectResponse
    {
        $user = User::find(auth()->user()->id);
        $oldFavorites = $user->favorites ? json_decode($user->favorites) : [];
        $message = 'Source added to favorites!';

        $favorites = Arr::prepend($oldFavorites, $request->get('id'));

        if (in_array($request->get('id'), $oldFavorites)) {
            $favorites = array_values(array_filter($oldFavorites, fn($item) => $item !== $request->get('id')));
            $message = 'Source removed from favorites.';
        }

        $user->update([
            'favorites' => json_encode($favorites),
        ]);

        return redirect()->back()->with('success', $message);
    }
}
