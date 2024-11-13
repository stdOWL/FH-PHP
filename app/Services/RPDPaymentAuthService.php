<?php

namespace App\Services;

use App\Services\Contracts\AuthService;
use Illuminate\Support\Facades\Http;

/**
 * Class RPDPaymentAuthService.
 */
class RPDPaymentAuthService implements AuthService
{
    /**
     * @param string $email
     * @param string $password
     *
     * @return object
     */
    public function getAccessToken(string $email, string $password): string
    {
        $response = Http::post('https://sandbox-reporting.rpdpymnt.com/api/v3/merchant/user/login', [
            'email' => $email,
            'password' => $password,
        ]);

        return $response->object()->token;
    }

    /**
     * @param string $transactionId
     * 
     * @return array
     */

    public function getClient(string $token): array
    {
       
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])->post('https://sandbox-reporting.rpdpymnt.com/api/v3/client', [
            'transactionId' => $transactionId,
        ]);

        var_dump($response->object());
        die();


        return $response->object();
    }
}
