<?php

namespace App\Http\Controllers;

use App\Action\User\LoginUserAction;
use App\Action\User\LogoutUserAction;
use App\Action\User\RegisterUserAction;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request): JsonResponse
    {
        return response()->json(RegisterUserAction::execute($request));
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        return response()->json(LoginUserAction::execute($request));
    }

    public function logout(): JsonResponse
    {
        return response()->json(LogoutUserAction::execute());
    }

    public function getBalance()
    {
        return response()->json([
            'user_id' => auth()->id(),
            'balance' => auth()->user()->balance ?? 0
        ]);
    }
}
