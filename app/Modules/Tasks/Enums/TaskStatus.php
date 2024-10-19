<?php

namespace App\Modules\Tasks\Enums;

use App\Helpers\Enums\Traits\ToArrayTrait;

enum TaskStatus: string
{
    use ToArrayTrait;

    case DRAFT = 'draft';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
}
