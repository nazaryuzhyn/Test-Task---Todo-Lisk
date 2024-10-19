<?php

namespace App\Modules\Tasks\Enums;

use App\Helpers\Enums\Traits\ToArrayTrait;

enum TaskPriority: string
{
    use ToArrayTrait;

    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';
}
