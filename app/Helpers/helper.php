<?php

use App\Models\BasicSettings;
use Illuminate\Support\Facades\Cache;

function getBasicSettings(){
    return Cache::remember('basic_settings', 60*60, function () {
        return BasicSettings::first();
    });
}
