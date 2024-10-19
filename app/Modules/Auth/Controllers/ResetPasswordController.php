<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Actions\ResetPassword;
use App\Modules\Auth\Data\ResetPasswordData;
use Illuminate\Http\JsonResponse;

class ResetPasswordController extends Controller
{
    public function __invoke(ResetPasswordData $request, ResetPassword $resetPassword): JsonResponse
    {
        return $resetPassword->handle($request);
    }
}
