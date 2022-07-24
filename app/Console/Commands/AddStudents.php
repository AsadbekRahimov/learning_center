<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Models\StudentGroup;
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
        $num = 0;
        foreach ($students as $student)
        {
            $new_student = Student::createStudent($student);
            $student_group = StudentGroup::saveStudents($new_student->id, $student["val2"]);
            $num++;
            $this->info($num);
        }
        return 0;
    }
}
