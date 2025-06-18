<?php

use App\Models\BasicSettings;

function getBasicSettings(){
    return BasicSettings::first();
}
