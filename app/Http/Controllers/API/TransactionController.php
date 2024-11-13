<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Contracts\TransactionService;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function report(Request $request)
    {
        $params = $request->only('fromDate', 'toDate', 'merchant', 'acquirer');
        $transactions = $this->transactionService->getTransactions($params['fromDate'], $params['toDate'], $params['merchant'], $params['acquirer']);
        return response()->json($transactions);
    }

    public function list(Request $request)
    {
        $token = request()->header('Authorization');
        $params = $request->only('fromDate', 'toDate', 'status', 'operation', 'merchantId', 'acquirerId', 'paymentMethod', 'errorCode', 'filterField', 'filterValue', 'page');
        $transactions = $this->transactionService->getTransactions($params['fromDate'], $params['toDate'], $token);
        return response()->json($transactions);
    }

    public function info(string $transactionId, Request $request)
    {
        $token = request()->header('Authorization');
        $transaction = $this->transactionService->getTransaction($transactionId, $token);
        return response()->json($transaction);
    }


    public function client(string $transactionId, Request $request)
    {
        $token = request()->header('Authorization');
        $client = $this->transactionService->getClient($transactionId, $token);
        return response()->json($client);
    }
}
