<?php


namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use niftepay\niftepay\NiftePay;

class JazzcashInstance extends TestCase
{
    /**
     * Instanciate the jazzcash
     * @return void
     */
    public function testNiftePayClassInstantiation(): void
    {
        $niftepay = new NiftePay();
        $this->assertInstanceOf(NiftePay::class, $niftepay);
    }
}
