<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        $categories = Category::all();
        return [
            'name' => fake()->name(),
            'category_id' => $categories->random(),
        ];
    }
}