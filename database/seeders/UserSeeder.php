<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin admin',
            'email' => 'admin@admin.com',
            'password' => 'Pa$$w0rd',
        ]);
    }
}
