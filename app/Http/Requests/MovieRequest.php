<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tmdb_id' => 'required|string',
            'listing_id' => 'required|integer',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
