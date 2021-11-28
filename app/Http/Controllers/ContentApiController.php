<?php

namespace App\Http\Controllers;

use App\Models\ContentInfo;
use App\Models\Verse;
use Illuminate\Http\Request;

class ContentApiController extends Controller
{

    public function getVerses()
    {

        $order = ContentInfo::firstWhere('name', 'verse')->start;
        $verses = Verse::where('order', '>=', $order)->paginate(10);

        $previous = null;
        if ($verses->currentPage() == $verses->lastPage()) {

            $previous = Verse::where('order', '<', $order)->paginate(10)->setPageName('previous');
        };
        $data = collect(['previous' => $previous, 'verses' => $verses]);


        return $data;
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
