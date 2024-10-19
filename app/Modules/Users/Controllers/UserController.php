<?php

namespace App\Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Users\Data\UserUpdateData;
use App\Modules\Users\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function update(UserUpdateData $request, User $user): JsonResponse
    {
        $user->update($request->toArray());

        return response()->json([
            'data' => new UserResource($user->refresh())
        ]);
    }

    public function destroy(User $user): Response
    {
        User::destroy($user->getKey());

        return response()->noContent();
    }
}
