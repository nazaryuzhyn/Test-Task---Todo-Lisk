<?php

namespace App\Modules\Auth\Data;

use App\Models\User;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Data;

class ForgotPasswordData extends Data
{
    public function __construct(
        #[Email]
        #[Exists(User::class, 'email')]
        public string $email,
    ) {}
}
