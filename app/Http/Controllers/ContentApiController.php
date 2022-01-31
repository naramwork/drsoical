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

    public function getHadith()
    {

        $order = ContentInfo::firstWhere('name', 'hadith')->start;
        $hadith = Hadith::where('order', '>=', $order)->paginate(10);
        $previous = null;
        if ($hadith->currentPage() >=  $hadith->lastPage()) {
            $currentPage = $hadith->currentPage() -  $hadith->lastPage() + 1;

            \Illuminate\Pagination\Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });
            $previous = Hadith::where('order', '<', $order)->paginate(10);
        }
        return collect(['previous' => $previous, 'hadith' => $hadith]);
    }

    public function getUpdatedContent($date = null)
    {
        if ($date == null) return $this->firstTimeData();


        $contentInfo = ContentInfo::select('name', 'start')->get();
        $VerseOrder = ContentInfo::firstWhere('name', 'verse')->start;
        $HadithOrder = ContentInfo::firstWhere('name', 'hadith')->start;

        $verses = Verse::Where('order', '>=', $VerseOrder)->take(3)->get();
        $dua = Dua::Where('updated_at', '>=', $date)->get();
        $hadith = Hadith::Where('order', '>=', $HadithOrder)->take(3)->get();
        return collect(['verses' => $verses, 'dua' => $dua, 'hadith' => $hadith, 'content_info' => $contentInfo]);
    }


    public function firstTimeData()
    {

        $VerseOrder = ContentInfo::firstWhere('name', 'verse')->start;
        $HadithOrder = ContentInfo::firstWhere('name', 'hadith')->start;

        $verses = Verse::Where('order', '>=', $VerseOrder)->take(3)->get();
        $dua = Dua::all();
        $hadith = Hadith::Where('order', '>=', $HadithOrder)->take(3)->get();
        return collect(['verses' => $verses, 'dua' => $dua, 'hadith' => $hadith]);
    }
}
