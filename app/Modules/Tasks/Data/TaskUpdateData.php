<?php

namespace App\Modules\Tasks\Data;

use App\Modules\Tasks\Enums\TaskPriority;
use App\Modules\Tasks\Enums\TaskStatus;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\Validation\DateFormat;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class TaskUpdateData extends Data
{
    public function __construct(
        #[Min(3)]
        #[Max(255)]
        public ?string $title = null,

        public ?string $description = null,

        public ?TaskStatus $status = null,

        public ?TaskPriority $priority = null,

        #[DateFormat('Y-m-d')]
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d')]
        public ?Carbon $due_date = null,
    ) {}
}
