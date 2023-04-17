<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobileLoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'device_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}