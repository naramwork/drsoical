<?php

namespace App\Http\Controllers;

use App\Models\CustomerProfile;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Element;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $attr = $request->validate([
            'sender_id' => 'required|numeric',
            'recipient_id' => 'required|numeric',
            'message' => 'required|string',
        ]);

        return  Message::create($attr)->load('sender')->load('recipient');
    }

    public function show($id)
    {
        $senderMessage = Message::where('sender_id', $id)->get()->groupBy('recipient_id');
        $recipientMessage = Message::where('recipient_id', $id)
            ->where('status', 'تمت الموافقة')
            ->get()->groupBy('sender_id');

        return collect(['send' => $senderMessage, 'receive' => $recipientMessage]);
    }


    public function getMessagesById($user_id, $recipient_id)
    {
        $senderMessage = Message::where('sender_id', $user_id)->where('recipient_id', $recipient_id)->get()->groupBy('recipient_id');
        $recipientMessage = Message::where('recipient_id', $user_id)
            ->where('sender_id', $recipient_id)
            ->where('status', 'تمت الموافقة')
            ->get()->groupBy('sender_id');

        return collect(['send' => $senderMessage, 'receive' => $recipientMessage]);
    }


    public function searchUsers(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'search' => 'required|string',
            'gender' => 'required|string',
        ]);
        $type = $request->type;
        $search = $request->search;
        $gender = $request->gender;
        if ($type == 'age') {
            $year = (int)Carbon::now()->format('Y');
            $userDate = ($year - (int)$search);
            $searchQuery = $userDate . '-01-01';
            return CustomerProfile::with('user')->where('birthdate', '>=', date($searchQuery))->where('gender', '!=', $gender)->get();
        } elseif ($type == 'name') {

            $results = Search::add(User::where('profile', CustomerProfile::class), ['name'])
                ->soundsLike()
                ->dontParseTerm()
                ->get($search);
            // $filtered_collection = $results->filter(function ($item) use($gender){
            //     return $item->profile->gender != 'm';
            // })->values();
            return $results;
        } else {
            $results = Search::add(CustomerProfile::with('user')->where('gender', '!=', $gender), [$type])
                ->soundsLike()
                ->dontParseTerm()
                ->get($search);

            return $results;
        }
    }
}
