<?php

namespace App\Services;

use App\Services\Contracts\TransactionService;
use Illuminate\Support\Facades\Http;

/**
 * Class RPDTransactionService.
 */
class RPDTransactionService implements TransactionService
{
    /**
     * @param string $transactionId
     * 
     * @return object
     */
    public function getClient(string $transactionId, string $token): object
    {
       
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->post('https://sandbox-reporting.rpdpymnt.com/api/v3/client', [
            'transactionId' => $transactionId,
        ]);
        return $response->object();
    }

    /**
     * @param string $fromDate
     * @param string $toDate
     * @param string $token
     * 
     * @return object
     */
    public function getTransactions(string $fromDate, string $toDate, string $token): object
    {
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->post('https://sandbox-reporting.rpdpymnt.com/api/v3/transaction/list', [
            'fromDate' => $fromDate,
            'toDate' => $toDate,
        ]);
        return $response->object();
    }

    public function getTransaction(string $transactionId, string $token): object
    {
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->post('https://sandbox-reporting.rpdpymnt.com/api/v3/transaction', [
            'transactionId' => $transactionId,
        ]);
        return $response->object();
    }
}
