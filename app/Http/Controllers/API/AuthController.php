<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\Contracts\AuthService;


use App\Http\Requests\LoginRequest;
use App\Http\Requests\GetClientRequest;


class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = $this->authService->getAccessToken($credentials['email'], $credentials['password']);
        // return oauth 2.0 format
        return response()->json(['access_token' => $token, 'token_type' => 'Bearer']);
    }
}
