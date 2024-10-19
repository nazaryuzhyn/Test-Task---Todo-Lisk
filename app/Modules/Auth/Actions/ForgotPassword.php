<?php

namespace App\Modules\Auth\Actions;

use App\Modules\Auth\Data\ForgotPasswordData;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Password;

class ForgotPassword
{
    public function handle(ForgotPasswordData $data): JsonResponse
    {
        $status = Password::sendResetLink($data->toArray());

        return match ($status) {
            Password::RESET_LINK_SENT => response()->json(['message' => __($status)]),
            default => response()->json(['message' => __($status)], 400)
        };
    }
}
