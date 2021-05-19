<?php

namespace App\Contracts;

use App\Models\Order;

Interface PromoPdfServiceInterface
{
    public function generate(Order $order);
}
