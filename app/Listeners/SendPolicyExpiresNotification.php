<?php

namespace App\Listeners;

use App\Events\PolicyExpires;
use App\Mail\PolicyEndMailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPolicyExpiresNotification
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
     * @param  PolicyExpires  $event
     * @return void
     */
    public function handle(PolicyExpires $event)
    {
        $order = $event->order;
        $customer_email = $order->customer->email;
        Mail::to($customer_email)->send(new PolicyEndMailer($order));
    }
}
