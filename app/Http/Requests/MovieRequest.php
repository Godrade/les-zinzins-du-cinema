<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tmdb_id' => 'nullable|string',
            'listing_id' => 'nullable|integer',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
