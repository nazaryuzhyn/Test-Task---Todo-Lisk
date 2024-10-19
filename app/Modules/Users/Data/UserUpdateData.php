<?php

namespace App\Modules\Users\Data;

use App\Models\User;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Support\Validation\References\RouteParameterReference;

class UserUpdateData extends Data
{
    public function __construct(
        #[Email]
        #[Unique(User::class, 'email', ignore: new RouteParameterReference('user', 'id'))]
        public string|Optional|null $email,

        #[Min(3)]
        #[Max(60)]
        public string|Optional|null $name,
    ) {}
}
