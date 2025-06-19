<?php

namespace App\Observers;

use App\Models\BasicSettings;
use Illuminate\Support\Facades\Cache;

class BasicSettingObserver
{
    /**
     * Handle the BasicSettings "created" event.
     */
    public function created(BasicSettings $basicSettings): void
    {
        //
    }

    /**
     * Handle the BasicSettings "updated" event.
     */
    public function updated(BasicSettings $basicSettings): void
    {
        Cache::forget('basic_settings');
    }

    /**
     * Handle the BasicSettings "deleted" event.
     */
    public function deleted(BasicSettings $basicSettings): void
    {
        //
    }

    /**
     * Handle the BasicSettings "restored" event.
     */
    public function restored(BasicSettings $basicSettings): void
    {
        //
    }

    /**
     * Handle the BasicSettings "force deleted" event.
     */
    public function forceDeleted(BasicSettings $basicSettings): void
    {
        //
    }
}
