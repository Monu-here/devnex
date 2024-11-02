<?php

use Illuminate\Support\Facades\DB;

function getFooterSetting()
{
    return DB::table('settings')->first();
}