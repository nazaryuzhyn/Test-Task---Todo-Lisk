<?php

namespace App\Modules\Tasks\Actions;

use App\Models\Task;
use App\Modules\Tasks\Data\TaskUpdateData;
use Illuminate\Support\Facades\DB;

class UpdateTask
{
    public function update(Task $task, TaskUpdateData $data): Task
    {
        return DB::transaction(function () use ($task, $data): Task {
            $task->fill(array_filter($data->toArray()));
            $task->save();

            return $task->refresh();
        });
    }
}
