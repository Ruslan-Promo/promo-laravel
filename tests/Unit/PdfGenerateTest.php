<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Services\PromoPdfService;
use Tests\TestCase;

class PdfGenerateTest extends TestCase
{

    private $order;
    private $PromoPdfService;

    public function setUp() : void
    {
        parent::setUp();

        $this->order = Order::findOrFail(1);
        $this->PromoPdfService = new PromoPdfService();
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testPdfGenerate()
    {
        $path = $this->PromoPdfService->generate($this->order);
        $checkPath = storage_path().'/policy_1.pdf';
        $this->assertEquals($checkPath, $path);
        unlink($path);
    }
}
