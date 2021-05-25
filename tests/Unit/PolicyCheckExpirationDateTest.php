<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Services\PolicyCheckService;
use Tests\TestCase;

class PolicyCheckExpirationDateTest extends TestCase
{

    private $order1, $order2, $order3, $order4;
    private $PolicyCheckService;

    public function setUp() : void
    {
        parent::setUp();

        $this->order1 = Order::findOrFail(1);
        $this->order2 = Order::findOrFail(2);
        $this->order3 = Order::findOrFail(3);
        $this->order4 = Order::findOrFail(4);
        $this->PolicyCheckService = new PolicyCheckService();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testPolicy1CheckExpirationDate()
    {
        $result = $this->PolicyCheckService->checkExpirationDate($this->order1);
        $this->assertFalse($result);
    }

    public function testPolicy2CheckExpirationDate()
    {
        $result = $this->PolicyCheckService->checkExpirationDate($this->order2);
        $this->assertFalse($result);
    }

    public function testPolicy3CheckExpirationDate()
    {
        $result = $this->PolicyCheckService->checkExpirationDate($this->order3);
        $this->assertFalse($result);
    }

    public function testPolicy4CheckExpirationDate()
    {
        $result = $this->PolicyCheckService->checkExpirationDate($this->order4);
        $this->assertFalse($result);
    }
}
