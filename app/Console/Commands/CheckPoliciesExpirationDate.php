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
    public function handle(PolicyCheckServiceInterface $policyCheckService)
    {
        $args = $this->arguments();
        $orderId = $args['id'] ?? null;
        if(null !== $orderId){
            $this->policyCheckExpirationDate($policyCheckService, $orderId);
            return 0;
        }

        $this->policiesCheckExpirationDate($policyCheckService);
        return 0;
    }

    private function policyCheckExpirationDate(PolicyCheckServiceInterface $policyCheckService, $orderId)
    {
        $order = Order::find($orderId);
        $policyCheckService->checkExpirationDate($order);
        echo 'Order: '.$order->id.' checked;'.PHP_EOL;
    }

    private function policiesCheckExpirationDate(PolicyCheckServiceInterface $policyCheckService){
        echo 'All orders start check...'.PHP_EOL;
        $date = date('Y-m-d', strtotime('+1 week'));
        $orders = Order::where('date_end', '<=', $date)->get();
        if($orders){
            foreach($orders as $order){
                $this->checkExpirationDate($policyCheckService, $order->id);
            }
        }
        echo 'End'.PHP_EOL;
    }
}
