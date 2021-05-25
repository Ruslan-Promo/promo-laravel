<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Services\PolicyCheckService;
use Tests\TestCase;

class PolicyCheckExpirationDateTest extends TestCase
{
    private $PolicyCheckService;

    public function setUp() : void
    {
        parent::setUp();
        $this->PolicyCheckService = new PolicyCheckService();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testEndPolicyWeek()
    {
        $order = Order::findOrFail(1);
        $result = $this->PolicyCheckService->checkExpirationDate($order);
        $this->assertFalse($result);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testEndPolicyTwoDays()
    {
        $order = Order::findOrFail(2);
        $result = $this->PolicyCheckService->checkExpirationDate($order);
        $this->assertFalse($result);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testEndPolicyOneDay()
    {
        $order = Order::findOrFail(3);
        $result = $this->PolicyCheckService->checkExpirationDate($order);
        $this->assertFalse($result);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testEndPolicyToday()
    {
        $order = Order::findOrFail(4);
        $order->date_end = date('Y-m-d');
        $result = $this->PolicyCheckService->checkExpirationDate($order);
        $this->assertTrue($result);
    }
}
