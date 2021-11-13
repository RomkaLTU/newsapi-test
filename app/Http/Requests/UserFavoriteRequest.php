<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFavoriteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'string|required',
        ];
    }
}
