<?php

namespace App\Console\Commands;

use App\Models\News;
use Elasticsearch\Client;
use Illuminate\Console\Command;

class SearchReindex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:reindex';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Indexes all news to Elasticsearch';

    private $elasticsearch;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Client $elasticsearch)
    {
        parent::__construct();
        $this->elasticsearch = $elasticsearch;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Indexing all news. This might take a while...');
        foreach (News::cursor() as $elem)
        {
            $this->elasticsearch->index([
                'index' => $elem->getSearchIndex(),
                'type' => $elem->getSearchType(),
                'id' => $elem->getKey(),
                'body' => $elem->toSearchArray(),
            ]);
            $this->output->write('.');
        }
        $this->info('\nDone!');
        return 0;
    }
}
