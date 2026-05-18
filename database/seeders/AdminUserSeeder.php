<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'ovion@gmail.com'],
            [
                'name' => 'Ovion Admin',
                'password' => Hash::make('ovion123'),
                'email_verified_at' => now(),
            ],
        );
    }
}
