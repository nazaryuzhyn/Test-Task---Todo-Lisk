<?php

namespace App\Modules\Tasks\Queries;

use App\Models\Task;
use App\Models\User;
use App\Modules\Tasks\Data\TaskFilterData;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetTasks
{
    const PER_PAGE = 10;
    const PAGE = 1;

    public function get(User $user, TaskFilterData $data): LengthAwarePaginator
    {
        return Task::query()
            ->where('user_id', '=', $user->getKey())
            ->when(!empty($data->status), function ($query) use ($data) {
                $query->where('status', '=', $data->status->value);
            })
            ->when(!empty($data->priority), function ($query) use ($data) {
                $query->where('status', '=', $data->priority->value);
            })
            ->orderBy($data->order_by, $data->order_direction)
            ->paginate(
                perPage: $data->perPage ?? self::PER_PAGE,
                page: $data->page ?? self::PAGE,
            );
    }
}
