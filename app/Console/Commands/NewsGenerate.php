<?php

namespace App\Console\Commands;

use App\Models\News;
use Illuminate\Console\Command;

class NewsGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:generate {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate news';

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
    public function handle()
    {
        $count = (int)$this->argument('count');
        if($count > 0){
            $news = News::factory($count)->create();
            echo 'Generate done. Count '.$count.PHP_EOL;
        }
        return 0;
    }
}
