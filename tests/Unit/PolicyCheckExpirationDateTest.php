<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Services\PolicyCheckService;
use Tests\TestCase;

class PolicyCheckExpirationDateTest extends TestCase
{

    private $order;
    private $PolicyCheckService;

    public function setUp() : void
    {
        parent::setUp();

        $this->order = Order::findOrFail(1);
        $this->PolicyCheckService = new PolicyCheckService();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testPolicyCheckExpirationDate()
    {
        $result = $this->PolicyCheckService->checkExpirationDate($this->order);
        //$this->assertTrue($result);
        $this->assertFalse($result);
    }
}
