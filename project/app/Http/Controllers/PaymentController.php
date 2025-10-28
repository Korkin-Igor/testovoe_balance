<?php

namespace App\Http\Controllers;

use App\Actions\StoreDepositAction;
use App\Actions\StoreTransferAction;
use App\Actions\StoreWithdrawAction;
use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\StoreTransferRequest;
use App\Http\Requests\StoreWithdrawRequest;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function deposit(StoreDepositRequest $request): JsonResponse
    {
        return StoreDepositAction::execute($request);
    }

    public function withdraw(StoreWithdrawRequest $request): JsonResponse
    {
        return StoreWithdrawAction::execute($request);
    }

    public function transfer(StoreTransferRequest $request): JsonResponse
    {
        return StoreTransferAction::execute($request);
    }
}
