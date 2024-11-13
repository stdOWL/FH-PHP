<?php

namespace App\Services\Contracts;

/**
 * Interface AuthService.
 */
interface AuthService
{
    /**
     * @param string $email
     * @param string $password
     *
     * @return bool
     */
    public function getAccessToken(string $email, string $password): string;
}