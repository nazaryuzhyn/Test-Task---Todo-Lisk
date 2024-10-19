<?php

namespace App\Modules\Tasks\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use App\Modules\Tasks\Actions\CreateTask;
use App\Modules\Tasks\Actions\UpdateTask;
use App\Modules\Tasks\Data\TaskCreateData;
use App\Modules\Tasks\Data\TaskFilterData;
use App\Modules\Tasks\Data\TaskUpdateData;
use App\Modules\Tasks\Queries\GetTasks;
use App\Modules\Tasks\Resources\TaskResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function index(TaskFilterData $request, GetTasks $tasks): AnonymousResourceCollection
    {
        /** @var User $user */
        $user = auth()->user();

        return TaskResource::collection(
            $tasks->get($user, $request)
        );
    }

    public function store(TaskCreateData $request, CreateTask $task): JsonResource
    {
        /** @var User $user */
        $user = auth()->user();

        $task = $task->create($user, $request);

        return new TaskResource($task);
    }

    public function show(Task $task): JsonResource
    {
        $task->load(['user']);

        return new TaskResource($task);
    }

    public function update(Task $task, TaskUpdateData $request, UpdateTask $updateTask): JsonResource
    {
        $task = $updateTask->update($task, $request);

        return new TaskResource($task);
    }

    public function destroy(Task $task): Response
    {
        Task::destroy($task->getKey());

        return response()->noContent();
    }
}
