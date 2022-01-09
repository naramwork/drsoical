<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'message',

    ];

    protected $with = ['sender'];
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
