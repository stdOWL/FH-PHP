<?php

namespace App\Services\Contracts;

/**
 * Interface AuthService.
 */
interface TransactionService
{
    /**
     * @param string $transactionId
     * 
     * @return array
     */
    public function getClient(string $transactionId, string $token): object;

    /**
     * @param string $fromDate
     * @param string $toDate
     * @param string $token
     * 
     * @return array
     */
    public function getTransactions(string $fromDate, string $toDate, string $token): object;
    public function getTransaction(string $transactionId, string $token): object;
}