<?php

use App\Models\ProjectCategory;
use Illuminate\Support\Facades\DB;

// function getFooterSetting()
// {
//     return DB::table('settings')->first();
// }
function getSetting()
{
    return DB::table('settings')->first();
}
function getHomeSetting()
{
    return DB::table('home_settings')->first();
}
function getAboutSetting()
{
    return DB::table('abouts')->first();
}
function getServiceSetting()
{
    return DB::table('services')->orderBy('created_at', 'Desc')->get();
}
function getProjectionSetting()
{
    $projectCategory = ProjectCategory::with('project')->get();
    return $projectCategory;
}
function getteamSetting()
{
    return DB::table('teams')->get();
}
function getContactSetting(){
    return DB::table('contacts')->orderBy('created_at', 'Desc')->first();
}
