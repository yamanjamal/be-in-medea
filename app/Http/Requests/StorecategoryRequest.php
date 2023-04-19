<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'discount' => ['required', 'integer', 'digits_between:1,100'],
            'parent_id' => ['required', 'exists:categories,id'],
            'menu_id' => ['required', 'exists:menus,id']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}