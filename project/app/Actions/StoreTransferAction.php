<?php

namespace App\Actions;

use App\Http\Requests\StoreTransferRequest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class StoreTransferAction
{

    public static function execute(StoreTransferRequest $request): JsonResponse
    {
        $data = $request->validated();

        $fromUser = User::where('id', $data['from_user_id'])->first();
        $toUser = User::where('id', $data['to_user_id'])->first();

        if (!$fromUser->exists()) {
            return response()->json([
                'message' => 'Пользователь (отправитель) не найден.',
            ], 404);
        }

        if (!$toUser->exists()) {
            return response()->json([
                'message' => 'Пользователь (получатель) не найден.',
            ], 404);
        }

        if ($fromUser->balance < $data['amount']) {
            return response()->json([
                'message' => 'Недостаточно средств.'
            ], 409);
        }

        try {
            DB::transaction(function ($data, $fromUser, $toUser) {
                Payment::create([
                    'user_id' => $fromUser->id,
                    'amount' => $data['amount'],
                    'comment' => $data['comment'] ?? null,
                    'status' => 'transfer_out',
                ]);
                Payment::create([
                    'user_id' => $toUser->id,
                    'amount' => $data['amount'],
                    'comment' => $data['comment'] ?? null,
                    'status' => 'transfer_in',
                ]);

                $fromUser->decrement('balance', $data['amount']);
                $toUser->increment('balance', $data['amount']);
            });

            return response()->json([
                'message' => 'Перевод между пользователями был успешно совершен.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Не удалось выполнить операцию.',
            ], 500);
        }
    }

}
