<?php

namespace App\Console\Commands;

use App\Models\Branch;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\RedDay;
use App\Notifications\AdminNotify;
use App\Services\TelegramNotify;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class AddLesson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:lesson';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'everyday lessons add';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (Branch::all() as $branch)
        {
            $red_days = RedDay::query()->whereDate('date', '>=', date('Y-m-d'))
                ->where('branch_id', $branch->id)->pluck('date');
            $today = date('Y-m-d');

            if (!$red_days->contains($today)) {
                $groups = Group::query()->with(['students', 'subject', 'teacher'])
                    ->where('is_active', '=', true)
                    ->where('branch_id', $branch->id)->get();

                foreach ($groups as $group)
                {
                    if ($group->day_type === 'odd' and in_array(date('l'), Group::ODD_DAYS) && $group->students->count())
                    {
                        Lesson::query()->create([
                            'date' => date('Y-m-d'),
                            'group_id' => $group->id,
                            'teacher_id' => $group->teacher_id,
                            'payment' => Group::calculatedLessonPrice($group),
                            'finish' => 0,
                        ]);
                    } elseif ($group->day_type === 'even' and in_array(date('l'), Group::EVEN_DAYS) && $group->students->count())
                    {
                        Lesson::query()->create([
                            'date' => date('Y-m-d'),
                            'group_id' => $group->id,
                            'teacher_id' => $group->teacher_id,
                            'payment' => Group::calculatedLessonPrice($group),
                            'finish' => 0,
                        ]);
                    }
                }
            } else {
                $message = 'Bugungi sana ishlanmaydigan kunlar sirasiga kiradi, shu sababdan bu kun uchun darslar qo\'yilmadi!';
                TelegramNotify::sendMessage($message, 'ishlanmaydigan_kun', $branch->name);
            }
        }
    }
}
