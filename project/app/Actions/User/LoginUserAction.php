<?php

namespace App\Action\User;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginUserAction
{

    public static function execute(LoginUserRequest $request): JsonResponse
    {
        if (!Auth::attempt($request)) {
            return response()->json([
                'message' => 'Ошибка авторизации. Проверьте логин или пароль.'
            ], 422);
        }

        $user = Auth::user();
        $user->tokens()->delete();

        return response()->json([
            'token' => $user->createToken('token')->plainTextToken,
            'message' => 'Вы успешно вошли.'
        ]);
    }

}
