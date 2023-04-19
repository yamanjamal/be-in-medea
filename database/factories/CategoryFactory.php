<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $menus = Menu::all();
        return [
            'name' => fake()->name(),
            'discount' => rand(1, 100),
            'is_leaf' => 1,
            'menu_id' => $menus->random(),
        ];
    }
}