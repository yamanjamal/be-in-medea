<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::factory(10)->create([
            'is_leaf' => 'false',
            'menu_id' => 1,
        ]);

        //subcategory
        Category::factory(1)->create([
            'is_leaf' => 'true',
            'menu_id' => 1,
            'parent_id' => 1,
        ]);
    }
}