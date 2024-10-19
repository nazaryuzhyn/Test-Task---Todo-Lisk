<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        /** @var User $user */
        $user = User::query()->where('email', '=', 'admin@admin.com')->first();

        Task::factory(20)
            ->for($user)
            ->create();
    }
}
