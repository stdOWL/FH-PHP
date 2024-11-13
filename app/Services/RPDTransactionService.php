<?php

namespace App\Services;

use App\Services\Contracts\TransactionService;
use Illuminate\Support\Facades\Http;

/**
 * Class RPDTransactionService.
 */
class RPDTransactionService implements TransactionService
{
    private $base_url;

    public function __construct()
    {
        $this->base_url = env('RPD_PAYMENT_BASE_URL');
    }
    /**
     * @param string $transactionId
     * 
     * @return object
     */
    public function getClient(string $transactionId, string $token): object
    {
       
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->post($this->base_url . '/client', [
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
        ])->post($this->base_url .  '/transaction/list', [
            'fromDate' => $fromDate,
            'toDate' => $toDate,
        ]);
        return $response->object();
    }

    public function getTransaction(string $transactionId, string $token): object
    {
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->post($this->base_url .  '/transaction', [
            'transactionId' => $transactionId,
        ]);
        return $response->object();
    }

    public function getTransactionReports(string $fromDate, string $toDate, string $token): object
    {
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->post($this->base_url . '/transactions/report', [
            'fromDate' => $fromDate,
            'toDate' => $toDate,
        ]);
        return $response->object();
    }
}
