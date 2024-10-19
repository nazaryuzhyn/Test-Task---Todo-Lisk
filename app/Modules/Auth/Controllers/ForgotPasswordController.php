<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Actions\ForgotPassword;
use App\Modules\Auth\Data\ForgotPasswordData;
use Illuminate\Http\JsonResponse;

class ForgotPasswordController extends Controller
{
    public function __invoke(ForgotPasswordData $request, ForgotPassword $forgotPassword): JsonResponse
    {
        return $forgotPassword->handle($request);
    }
}
