<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class ClearExpiredServices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired-services:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear expired services';

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
     * @return mixed
     */
    public function handle()
    {
        dd(config('app.locale'));
    }
}
