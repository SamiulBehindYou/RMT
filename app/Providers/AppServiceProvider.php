<?php

namespace App\Providers;

use App\Models\BasicSettings;
use App\Models\Message;
use App\Observers\BasicSettingObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        $g_messages = Message::orderBy('id', 'DESC')->limit(5)->get();
        $new_messages = Message::where('status', 0)->count();
        $settings = BasicSettings::first();
        View::share(compact('new_messages', 'g_messages', 'settings'));


        // Observers
        BasicSettings::observe(BasicSettingObserver::class);
    }
}
