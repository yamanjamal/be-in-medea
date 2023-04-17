<?php

namespace Database\Seeders;

use App\Enums\TripStatus;
use App\Enums\UserState;
use App\Models\Trip;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //admin
        User::factory()->create([
            'name' => 'admin',
            'email' => 'a@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => 1,
            // password
        ]);

        //user
        User::factory()->create([
            'name' => 'user',
            'email' => 'u@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            // password
        ]);
    }
}