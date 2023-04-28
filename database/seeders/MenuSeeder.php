<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Menu::factory(10)->create();
        Menu::factory(1)->create([
            'title' => 'ANAS FOOD',
            'user_id' => User::first(),
        ]);
    }
}