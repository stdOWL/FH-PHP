<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use Illuminate\Http\Request;
use App\Http\Controllers\API\TransactionController;
use App\Services\Contracts\TransactionService;
use Illuminate\Foundation\Testing\RefreshDatabase;


class TransactionTest extends TestCase
{
    protected $transactionService;
    protected $controller;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Mock the TransactionService
        $this->transactionService = Mockery::mock(TransactionService::class);
        $this->controller = new TransactionController($this->transactionService);

    }

    public function testReport()
    {
        $request = new Request([
            'fromDate' => '2023-01-01',
            'toDate' => '2023-01-31'
        ]);
        $token = 'Bearer token';

        // Mocking the method call
        $this->transactionService
            ->shouldReceive('getTransactionReports')
            ->with('2023-01-01', '2023-01-31', $token)
            ->once()
            ->andReturn((object)['data' => 'transaction_report']);

        $request->headers->set('Authorization', $token);
        $response = $this->controller->report($request);
        $responseData = $response->getData(true);

        $this->assertEquals(['data' => 'transaction_report'], $responseData);
    }

    public function testList()
    {
        $request = new Request([
            'fromDate' => '2023-01-01',
            'toDate' => '2023-01-31'
        ]);
        $token = 'Bearer token';

        // Mocking the method call
        $this->transactionService
            ->shouldReceive('getTransactions')
            ->with('2023-01-01', '2023-01-31', $token)
            ->once()
            ->andReturn((object)['data' => 'transactions']);

        $request->headers->set('Authorization', $token);

        $response = $this->controller->list($request);
        $responseData = $response->getData(true);

        $this->assertEquals(['data' => 'transactions'], $responseData);
    }

    public function testInfo()
    {
        $token = 'Bearer token';
        $transactionId = 'txn123';

        $this->transactionService
            ->shouldReceive('getTransaction')
            ->with($transactionId, $token)
            ->once()
            ->andReturn((object)['data' => 'transaction_info']);

        $request = new Request();
        $request->headers->set('Authorization', $token);

        $response = $this->controller->info($transactionId, $request);
        $responseData = $response->getData(true);

        $this->assertEquals(['data' => 'transaction_info'], $responseData);
    }

    public function testClient()
    {
        $token = 'Bearer token';
        $transactionId = 'txn123';

        $this->transactionService
            ->shouldReceive('getClient')
            ->with($transactionId, $token)
            ->once()
            ->andReturn((object)['data' => 'client_info']);

        $request = new Request();
        $request->headers->set('Authorization', $token);

        $response = $this->controller->client($transactionId, $request);
        $responseData = $response->getData(true);

        $this->assertEquals(['data' => 'client_info'], $responseData);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

}
