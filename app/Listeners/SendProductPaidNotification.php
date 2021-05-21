<?php

namespace App\Listeners;

use App\Events\ProductPaid;
use App\Mail\ProductPaidMailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendProductPaidNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductPaid  $event
     * @return void
     */
    public function handle(ProductPaid $event)
    {
        $order = $event->order;
        $customer_email = $order->customer->email;
        Mail::to($customer_email)->send(new ProductPaidMailer($order));
    }
}
