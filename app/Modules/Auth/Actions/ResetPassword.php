<?php

namespace App\Modules\Auth\Actions;

use App\Models\User;
use App\Modules\Auth\Data\ResetPasswordData;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Password;

class ResetPassword
{
    public function handle(ResetPasswordData $data): JsonResponse
    {
        $status = Password::reset(
            $data->toArray(),
            function (User $user, string $password) {
                $user->password = $password;
                $user->save();

                event(new PasswordReset($user));
            }
        );

        return match ($status) {
            Password::PASSWORD_RESET => response()->json(['message' => __($status)]),
            default => response()->json(['message' => __($status)], 400)
        };
    }
}
