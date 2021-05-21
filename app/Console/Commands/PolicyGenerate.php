<?php

namespace App\Console\Commands;

use App\Contracts\PromoPdfServiceInterface;
use App\Models\Order;
use App\Traits\UploadTrait;
use Illuminate\Console\Command;

class PolicyGenerate extends Command
{
    use UploadTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'policy:generate {orderId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insurance policy generation';

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
    public function handle(PromoPdfServiceInterface $pdfService)
    {
        $order = Order::find($this->argument('orderId'));
        $path = $pdfService->generate($order);
        $policy = $this->moveFile($path);
        unlink($path);
        $path = $policy->getStoragePath();
        echo asset($path).PHP_EOL;
    }
}
