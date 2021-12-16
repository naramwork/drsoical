<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    protected $fillable = [
        'sender_id',
        'message',
        'recipient_id',
    ];

    protected $with = ['sender', 'recipient'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }


    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}
