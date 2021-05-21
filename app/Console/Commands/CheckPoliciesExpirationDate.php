<?php

namespace App\Console\Commands;

use App\Contracts\PolicyCheckServiceInterface;
use App\Models\Order;
use Illuminate\Console\Command;

class CheckPoliciesExpirationDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'policy:check {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking policies for expiration dates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(PolicyCheckServiceInterface $police)
    {

        $args = $this->arguments();
        if(isset($args['id'])){
            $order = Order::find($args['id']);
            $flag = $police->check($order);
            echo 'Order: '.$order->id.' checked;'.PHP_EOL;
        }else{
            echo 'All orders start check...'.PHP_EOL;
            $date = date('Y-m-d', strtotime('+1 week'));
            $orders = Order::where('date_end', '<=', $date)->get();
            if($orders){
                echo 'Orders go'.PHP_EOL;
                foreach($orders as $order){
                    if($police->check($order)){
                        echo 'Order: '.$order->id.' send mail;'.PHP_EOL;
                    }else{
                        echo 'Order: '.$order->id.' not send;'.PHP_EOL;
                    }
                }
            }else{
                echo 'No orders'.PHP_EOL;
            }
            echo 'End check.'.PHP_EOL;
        }

        //$policies = Order::whereDateEnd()
        return 0;
    }
}
