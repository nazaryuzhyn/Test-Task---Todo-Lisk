<?php

namespace Tests\Feature\Tasks;

use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    private User $user;

    private Task $task;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->task = Task::factory()
            ->for($this->user)
            ->create();
    }

    public function testGetTasks(): void
    {
        $response = $this->actingAs($this->user)
            ->getJson(route('tasks.index'));

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'description',
                    'status',
                    'priority',
                    'due_date',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
    }

    public function testCreateTask(): void
    {
        $data = Task::factory()->make()->toArray();

        $response = $this->actingAs($this->user)
            ->postJson(route('tasks.store'), $data);

        $response->assertCreated();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'description',
                'status',
                'priority',
                'due_date',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    public function testUpdateTask(): void
    {
        $data = Task::factory()->make()->toArray();

        $response = $this->actingAs($this->user)
            ->putJson(route('tasks.update', $this->task), $data);

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'description',
                'status',
                'priority',
                'due_date',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    public function testDeleteTask(): void
    {
        $response = $this->actingAs($this->user)
            ->deleteJson(route('tasks.destroy', $this->task));

        $response->assertNoContent();
    }
}
