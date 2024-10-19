<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use App\Modules\Tasks\Enums\TaskPriority;
use App\Modules\Tasks\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'status' => $this->faker->randomElement(TaskStatus::toArray()),
            'priority' => $this->faker->randomElement(TaskPriority::toArray()),
            'due_date' => $this->faker->date,
        ];
    }
}
