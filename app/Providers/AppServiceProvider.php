<?php

namespace App\Providers;

use App\Models\Lesson;
use App\Services\CacheResults;
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
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
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
        CacheResults::cacheAll();
    }
}
