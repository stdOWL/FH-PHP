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
     * @param array $optionalParams 
     * 
     * @return object
     */
    public function getTransactions(string $fromDate, string $toDate, string $token, array $optionalParams = []): object
    {
        $requestParams = [
            'fromDate' => $fromDate,
            'toDate' => $toDate,
        ];   
        $requestParams = array_merge($requestParams, $optionalParams);
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->post($this->base_url .  '/transaction/list', $requestParams);
        
        // the problem here, response has first_page_url, next_page_url, prev_page_url, path
        // so we need to remove them before returning the response to prevent provider specific data to be exposed
        $response = $response->object();
        unset($response->first_page_url);
        unset($response->next_page_url);
        unset($response->prev_page_url);
        unset($response->path);
        

        return $response;
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

    public function getTransactionReports(string $fromDate, string $toDate, string $token, array $optionalParams = []): object
    {   
        $requestParams = [
            'fromDate' => $fromDate,
            'toDate' => $toDate,
        ];

        // Merge optional parameters
        $requestParams = array_merge($requestParams, $optionalParams);

        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->post($this->base_url . '/transactions/report', $requestParams);
        return $response->object();
    }
}
