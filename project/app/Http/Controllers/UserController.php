<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function getBalance(User $user): JsonResponse
    {
        return response()->json([
            'user_id' => $user->id,
            'balance' => $user->balance ?? 0.0
        ]);
    }
}
