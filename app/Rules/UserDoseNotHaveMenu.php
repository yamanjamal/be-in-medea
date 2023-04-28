<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidatorAwareRule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Validation\DataAwareRule;

class UserDoseNotHaveMenu implements Rule, DataAwareRule
{
    protected $data = [];

    public function __construct()
    {
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function passes($attribute, $value): bool
    {
        return !is_null(
            auth()->user()
                ->Menu()
                ->first()
        );
    }

    public function message(): string
    {
        return 'You already have a menu !.';
    }
}