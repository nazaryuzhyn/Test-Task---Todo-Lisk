<?php

namespace App\Modules\Auth\Data;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class ResetPasswordData extends Data
{
    public function __construct(
        public string $token,

        #[Email]
        public string $email,

        #[Min(8)]
        #[Max(50)]
        public string $password,

        public string $password_confirmation,
    ) {}
}
