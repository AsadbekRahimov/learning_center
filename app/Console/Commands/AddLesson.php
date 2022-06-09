<?php

namespace App\Console\Commands;

use App\Models\Branch;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\RedDay;
use Illuminate\Console\Command;

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
                $groups = Group::query()->where('is_active', '=', true)
                    ->where('branch_id', $branch->id)->get();

                foreach ($groups as $group)
                {
                    if ($group->day_type === 'odd' and in_array(date('l'), ["Monday", "Wednesday", "Friday"]))
                    {
                        Lesson::query()->create([
                            'date' => date('Y-m-d'),
                            'group_id' => $group->id,
                        ]);
                    } elseif ($group->day_type === 'even' and in_array(date('l'), ["Tuesday", "Thursday", "Saturday"]))
                    {
                        Lesson::query()->create([
                            'date' => date('Y-m-d'),
                            'group_id' => $group->id,
                        ]);
                    }
                }
            } else {
                // TODO : red days notifier
            }
        }
    }
}
