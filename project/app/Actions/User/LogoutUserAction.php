<?php

namespace App\Action\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LogoutUserAction
{

    public static function execute(): JsonResponse
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Вы успешно вышли.'
        ]);
    }

}
