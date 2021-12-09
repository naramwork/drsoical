<?php

namespace App\Http\Controllers;

use App\Models\ContentInfo;
use App\Models\Dua;
use App\Models\Hadith;
use App\Models\Verse;

class ContentApiController extends Controller
{

    public function getVerses()
    {

        $order = ContentInfo::firstWhere('name', 'verse')->start;
        $verses = Verse::where('order', '>=', $order)->paginate(10);
        $previous = null;
        if ($verses->currentPage() >=  $verses->lastPage()) {
            $currentPage = $verses->currentPage() -  $verses->lastPage() + 1;

            \Illuminate\Pagination\Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });
            $previous = Verse::where('order', '<', $order)->paginate(10);
        }
        return collect(['previous' => $previous, 'verses' => $verses]);
    }


    public function getUpdatedContent($date = null)
    {
        if ($date == null) return $this->firstTimeData();


        $contentInfo = ContentInfo::select('name', 'start')->get();
        $verses = Verse::Where('updated_at', '>=', $date)->get();
        $dua = Dua::Where('updated_at', '>=', $date)->get();
        $hadith = Hadith::Where('updated_at', '>=', $date)->get();
        return collect(['verses' => $verses, 'dua' => $dua, 'hadith' => $hadith, 'content_info' => $contentInfo]);
    }


    public function firstTimeData()
    {
        $contentInfo = ContentInfo::select('name', 'start')->get();
        $verses = Verse::All();
        $dua = Dua::all();
        $hadith = Hadith::all();
        return collect(['verses' => $verses, 'dua' => $dua, 'hadith' => $hadith, 'content_info' => $contentInfo]);
    }

    // public function getContentInfo()
    // {
    //     //return ContentInfo::all();
    //     return $lastRecordDate = Verse::max('updated_at');
    // }
}
