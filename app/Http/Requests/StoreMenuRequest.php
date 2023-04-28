<?php

namespace App\Http\Requests;

use App\Rules\UserDoseNotHaveMenu;
use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', new UserDoseNotHaveMenu()],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}