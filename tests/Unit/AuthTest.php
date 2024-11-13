<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\API\AuthController;
use App\Services\Contracts\AuthService;

class AuthTest extends TestCase
{
    protected $authService;
    protected $controller;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock the AuthService
        $this->authService = Mockery::mock(AuthService::class);
        $this->controller = new AuthController($this->authService);
    }

    public function testLogin()
    {
        $credentials = [
            'email' => 'test@example.com',
            'password' => 'password123'
        ];
        $token = 'sample_token';

        // Mocking the service method
        $this->authService
            ->shouldReceive('getAccessToken')
            ->with($credentials['email'], $credentials['password'])
            ->once()
            ->andReturn($token);

        // Creating a request with the login credentials
        $request = new LoginRequest($credentials);

        $response = $this->controller->login($request);

        $responseData = $response->getData(true);

        $this->assertEquals([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], $responseData);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}