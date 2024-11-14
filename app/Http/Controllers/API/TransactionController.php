<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Contracts\TransactionService;

use App\Http\Requests\TransactionsListRequest;
use App\Http\Requests\TransactionsReportRequest;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function report(TransactionsReportRequest $request)
    {
        // Get token from header
        $token = $request->header('Authorization');

        // Get Mandatory parameters
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        // Get optional parameters
        $optionalParams = $request->only('merchant', 'acquirer');

        $params = $request->only('fromDate', 'toDate');
        $transactions = $this->transactionService->getTransactionReports($params['fromDate'], $params['toDate'], $token, $optionalParams);
        return response()->json($transactions);
    }

    public function list(TransactionsListRequest $request)
    {
        // Get token from header
        $token = $request->header('Authorization');
        
        // Get Mandatory parameters
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        // Get Optional parameters
        $optionalParams = $request->only('status', 'operation', 'merchantId', 'acquirerId', 'paymentMethod', 'errorCode', 'filterField', 'filterValue', 'page');
        
        // Get transactions
        $transactions = $this->transactionService->getTransactions($fromDate, $toDate, $token, $optionalParams);
        return response()->json($transactions);
    }

    public function info(string $transactionId, Request $request)
    {
        $token = $request->header('Authorization');
        $transaction = $this->transactionService->getTransaction($transactionId, $token);
        return response()->json($transaction);
    }


    public function client(string $transactionId, Request $request)
    {
        $token = $request->header('Authorization');
        $client = $this->transactionService->getClient($transactionId, $token);
        return response()->json($client);
    }
}
