<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetPaymentFromBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        # TODO add logic for payment getting from student's balance | only monthly branch
        return 0;
    }
}
