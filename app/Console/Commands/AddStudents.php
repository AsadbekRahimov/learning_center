<?php

namespace App\Console\Commands;

use App\Models\Student;
use Illuminate\Console\Command;

class AddStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'students:add';

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
        require 'studentsList.php';
        dd(($students));


        return 0;
    }
}
