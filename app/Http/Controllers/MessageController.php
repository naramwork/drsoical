<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $attr = $request->validate([
            'sender_id' => 'required|numeric',
            'recipient_id' => 'required|numeric',
            'message' => 'required|string',
        ]);

        return  Message::create($attr);
    }
}
