<?php

namespace App\Observers;

use App\Models\Attandance;
use App\Models\Lesson;

class LessonObserver
{
    public function created(Lesson $lesson)
    {
        foreach($lesson->students as $student)
        {
            Attandance::query()->create([
                'lesson_id' => $lesson->id,
                'student_id' => $student->student_id,
                'attand' => true,
            ]);
        }
    }
}
