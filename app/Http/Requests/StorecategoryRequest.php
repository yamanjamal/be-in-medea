<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'discount' => ['nullable', 'integer', 'digits_between:1,100'],
            'subCategories.*.name' => ['required', 'string'],
            'subCategories.*.discount' => ['nullable', 'integer', 'digits_between:1,100'],
            // 'parent_id' => ['nullable', 'exists:categories,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}