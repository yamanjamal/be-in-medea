<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatecategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'discount' => ['nullable', 'integer', 'digits_between:1,100'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}