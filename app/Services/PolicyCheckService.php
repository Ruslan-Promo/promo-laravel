<?php
namespace App\Services;

use App\Contracts\PolicyCheckServiceInterface;
use App\Events\PolicyExpires;
use App\Models\Order;

class PolicyCheckService implements PolicyCheckServiceInterface
{
    public function checkExpirationDate(Order $order)
    {
        $array_date = [
            date_create("+1 week"),
            date_create("+2 days"),
            date_create("+1 day"),
            date_create("now")
        ];
        $order_date = date_create($order->date_end);

        if(in_array($order_date, $array_date)){
            event(new PolicyExpires($order));
            return true;
        }
        return false;
    }
}
