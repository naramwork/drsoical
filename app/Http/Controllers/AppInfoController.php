<?php

namespace App\Http\Controllers;

use App\Models\AppInfo;
use Illuminate\Http\Request;

class AppInfoController extends Controller
{


    public function getAppAd()
    {
        return AppInfo::where('type', 'app_ad')->first();
    }

    public function getAboutUs()
    {
        return AppInfo::where('type', 'about_us')->first();
    }

    public function getMarriageExplain()
    {
        return AppInfo::where('type', 'marriage_explain')->first();
    }

    public function getCallUs()
    {
        return AppInfo::where('type', 'call_us')->get();
    }
}
