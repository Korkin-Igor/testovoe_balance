<?php

namespace App\Http\Controllers;

use App\Action\Payment\StoreDepositAction;
use App\Http\Requests\StoreDepositRequest;
use App\Http\Requests\StoreTransferRequest;
use App\Http\Requests\StoreWithdrawRequest;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    public function deposit(StoreDepositRequest $request): JsonResponse
    {
        return response()->json(StoreDepositAction::execute());
    }

    public function withdraw(StoreWithdrawRequest $request)
    {
        //
    }

    public function transfer(StoreTransferRequest $request)
    {
        //
    }
}
