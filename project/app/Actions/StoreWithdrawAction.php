<?php

namespace App\Action;

use App\Http\Requests\StoreWithdrawRequest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class StoreWithdrawAction
{

    public static function execute(StoreWithdrawRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = User::where('id', $data['user_id'])->first();

        if (!$user->exists()) {
            return response()->json([
                'message' => 'Пользователь не найден.',
            ], 404);
        }

        try {
            DB::transaction(function ($data, $user) {
                Payment::create([
                    'user_id' => $user->id,
                    'amount' => $data['amount'],
                    'comment' => $data['comment'] ?? null,
                    'status' => 'withdraw',
                ]);

                $user->decrement('balance', $data['amount']);
            });

            return response()->json([
                'message' => 'Средства успешно списаны.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Не удалось выполнить операцию.',
            ], 500);
        }
    }

}
