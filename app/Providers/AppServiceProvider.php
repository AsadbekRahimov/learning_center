<?php

namespace App\Providers;

use App\Models\Lesson;
use App\Models\StudentGroup;
use App\Observers\StudentGroupObserver;
use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;
use Orchid\Platform\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Dashboard::useModel(User::class, \App\Models\User::class);
        Lesson::observe(\App\Observers\LessonObserver::class);
        StudentGroup::observe(StudentGroupObserver::class);
    }
}
