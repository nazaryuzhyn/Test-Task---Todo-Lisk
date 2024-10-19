<?php

namespace App\Modules\Tasks\Actions;

use App\Models\Task;
use App\Models\User;
use App\Modules\Tasks\Data\TaskCreateData;
use Illuminate\Support\Facades\DB;

class CreateTask
{
    public function create(User $user, TaskCreateData $data): Task
    {
        return DB::transaction(function () use ($user, $data): Task {
            $task = new Task();
            $task->fill(array_filter($data->toArray()));
            $task->user()->associate($user);
            $task->save();

            return $task->refresh();
        });
    }
}
