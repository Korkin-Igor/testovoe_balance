<?php

namespace App\Http\Controllers;

use App\Action\Payment\StoreDepositAction;
use App\Action\Payment\StoreTransferAction;
use App\Action\Payment\StoreWithdrawAction;
use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\StoreTransferRequest;
use App\Http\Requests\StoreWithdrawRequest;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function deposit(StoreDepositRequest $request): JsonResponse
    {
        return response()->json(StoreDepositAction::execute($request));
    }

    public function withdraw(StoreWithdrawRequest $request): JsonResponse
    {
        return response()->json(StoreWithdrawAction::execute($request));
    }

    public function transfer(StoreTransferRequest $request): JsonResponse
    {
        return response()->json(StoreTransferAction::execute($request));
    }
}
