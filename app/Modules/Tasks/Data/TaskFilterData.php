<?php

namespace App\Modules\Tasks\Data;

use App\Modules\Tasks\Enums\TaskPriority;
use App\Modules\Tasks\Enums\TaskStatus;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Data;

class TaskFilterData extends Data
{
    public function __construct(
        public ?TaskStatus $status = null,
        public ?TaskPriority $priority = null,

        public ?int $perPage = null,
        public ?int $page = null,

        #[In(['due_date', 'created_at'])]
        public ?string $order_by = 'created_at',

        #[In(['asc', 'desc'])]
        public ?string $order_direction = 'desc',
    ) {}
}
