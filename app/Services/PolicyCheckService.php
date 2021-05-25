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
            date_create(date('Y-m-d', strtotime("+1 week"))),
            date_create(date('Y-m-d', strtotime("+2 days"))),
            date_create(date('Y-m-d', strtotime("+1 day"))),
            date_create(date('Y-m-d', strtotime("now")))
        ];
        $order_date = date_create(date('Y-m-d', strtotime($order->date_end)));

        if(in_array($order_date, $array_date)){
            event(new PolicyExpires($order));
            return true;
        }
        return false;
    }
}
