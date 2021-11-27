<?php

namespace App\Http\Controllers;

use App\Models\ContentInfo;
use App\Models\Verse;
use Illuminate\Http\Request;

class ContentApiController extends Controller
{

    public function getVerses()
    {

        $order = ContentInfo::first('start')->start;

        return Verse::where('order', '>=', $order)->cursorPaginate(10);
    }

    public function getUpdatedContent($date)
    {
        return [
            "verses" => Verse::where('updated_at', '>', $date)->get(),
        ];
    }

    // public function getContentInfo()
    // {
    //     //return ContentInfo::all();
    //     return $lastRecordDate = Verse::max('updated_at');
    // }
}
