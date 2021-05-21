<?php

namespace App\Contracts;

use App\Models\Order;

Interface PolicyCheckServiceInterface
{
    public function checkExpirationDate(Order $order);
}
