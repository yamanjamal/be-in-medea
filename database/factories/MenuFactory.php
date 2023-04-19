<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    public function definition(): array
    {
        $users = User::all();
        return [
            'title' => fake()->title(),
            'user_id' => $users->random(),
        ];
    }
}