<?php

use Illuminate\Support\Facades\DB;

// function getFooterSetting()
// {
//     return DB::table('settings')->first();
// }
function getHomeSetting()
{
    return DB::table('home_settings')->first();
}
