<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    public static $createRules = [
        'job' => ['string', 'max:255', 'nullable'],
        'gender' => ['string', 'max:1', 'nullable'],
        'children_number' => ['numeric', 'nullable'],
        'mirage_type' => ['string', 'max:255', 'nullable'],
        'social_status' => ['string', 'max:255', 'nullable'],
        'city' => ['string', 'max:255', 'nullable'],
        'about' => ['string', 'nullable'],
        'income' => ['numeric', 'max:255', 'nullable'],
        'specifications' => ['string', 'nullable', 'nullable'],
        'smoking' => ['string', 'max:255', 'nullable'],
        'beard' => ['string', 'max:255', 'nullable'],
        'qualification' => ['string', 'max:255', 'nullable'],
        'certificate' => ['string', 'max:255', 'nullable'],
        'financial_status' => ['string', 'max:255', 'nullable'],
        'health_status' => ['string', 'max:255', 'nullable'],
        'nationality' => ['string', 'max:255', 'nullable'],
        'residence' => ['string', 'nullable'],
        'height' => ['numeric', 'max:255', 'nullable'],
        'location' => ['string', 'max:255', 'nullable'],
        'skin_colour' => ['string', 'max:255', 'nullable'],
        'physique' => ['string', 'max:255', 'nullable'],
        'religiosity' => ['string', 'max:255', 'nullable'],
        'prayer' => ['string', 'nullable'],
        'weight' => ['numeric', 'nullable'],
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }
}
