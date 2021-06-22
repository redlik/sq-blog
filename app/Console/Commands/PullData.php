<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Log;

class PullData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pull:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pulls data from API';

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
        (new \App\Http\Controllers\AdminController)->getPosts();
        Log::info('Data imported successfully');

        return 0;
    }
}
