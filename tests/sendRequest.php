<?php


namespace Tests\Unit;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use niftepay\NiftePay\NiftePay;

class sendRequest extends TestCase
{
    /**
     * Test Send Request Method
     *
     * @return void
     */
    public function testSendRequestMethod(): void
    {
        $niftepay = new NiftePay();
        $niftepay->setAmount(1000); // last 2 digits will be considered as decimals.
        $niftepay->setBillReference('bill123');
        $niftepay->setProductDescription('Test product');
        $response = $niftepay->sendRequest();
        $this->assertInstanceOf(Response::class, $response);
    }
}
