<?php

// في app/Http/Requests/SearchProductsRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchProductsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'search' => 'nullable|string|max:255',
            'category' => 'nullable|exists:categories,slug',
            'sort' => 'nullable|in:popular,newest,price_asc,price_desc',
            'per_page' => 'nullable|in:9,12,18,24',
        ];
    }
}