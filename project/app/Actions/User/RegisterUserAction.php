<?php

namespace App\Action\User;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterUserAction
{

    public static function execute(RegisterUserRequest $request): JsonResponse
    {
        $user = User::create($request->all());
        return response()->json([
            'token' => $user->createToken('token')->plainTextToken,
            'message' => 'Вы успешно зарегистрировались'
        ]);
    }

}
