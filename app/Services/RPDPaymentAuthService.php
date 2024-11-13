<?php

namespace App\Services;

use App\Services\Contracts\AuthService;
use Illuminate\Support\Facades\Http;

/**
 * Class RPDPaymentAuthService.
 */
class RPDPaymentAuthService implements AuthService
{
    private $base_url;

    public function __construct()
    {
        $this->base_url = env('RPD_PAYMENT_BASE_URL');
    }
    /**
     * @param string $email
     * @param string $password
     *
     * @return object
     */
    public function getAccessToken(string $email, string $password): string
    {
        $response = Http::post($this->base_url . '/merchant/user/login', [
            'email' => $email,
            'password' => $password,
        ]);

        return $response->object()->token;
    }
}
