<?php

namespace App\Observers;

use App\Models\Attandance;
use App\Models\Lesson;

class LessonObserver
{
    public function created(Lesson $lesson)
    {
        foreach($lesson->students as $studentGroup)
        {
            Attandance::query()->create([
                'lesson_id' => $lesson->id,
                'student_id' => $studentGroup->student_id,
                'attand' => $studentGroup->student->status == 'accepted' ? 1 : 2,
            ]);
        }
    }
}
