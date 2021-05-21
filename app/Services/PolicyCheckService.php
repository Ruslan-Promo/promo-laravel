<?php
namespace App\Services;

use App\Contracts\PolicyCheckServiceInterface;
use App\Mail\PolicyEndMailer;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class PolicyCheckService implements PolicyCheckServiceInterface
{
    public function check(Order $order)
    {
        $array_date = [
            date_create("+1 week"),
            date_create("+2 days"),
            date_create("+1 day"),
            date_create("now")
        ];
        $order_date = date_create($order->date_end);

        if(in_array($order_date, $array_date)){
            $this->send($order);
            return true;
        }
        return false;
    }

    private function send(Order $order){
        $customer_email = $order->customer->email;
        Mail::to($customer_email)->send(new PolicyEndMailer($order));
        echo 'aaa';
    }
}
