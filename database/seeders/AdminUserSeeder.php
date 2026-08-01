<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@jummagujjarnihari.test'],
            [
                'name' => 'Restaurant Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '+923041300535',
            ]
        );
    }
}
