<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    use HasFactory;

    protected $casts = [

        'more' => 'array',
        'fire_base_token' => 'array'
    ];

    public static $createRules = [
        'job' => ['string', 'max:255', 'required'],
        'phone_number' => ['string', 'max:255', 'required'],
        'gender' => ['string', 'max:1', 'required'],
        'children_number' => ['numeric', 'required'],
        'educational_Status' => ['string', 'max:255', 'required'],
        'social_status' => ['string', 'max:255', 'required'],
        'city' => ['string', 'max:255', 'required'],
        'nationality' => ['string', 'max:255', 'required'],
        'civil_id_no' => ['string', 'max:255', 'required'],
        'civil_id_no_exp' => ['string', 'max:255', 'required'],
        'fire_base_token' => ['required'],
        'birthdate' => ['date', 'max:255', 'required'],
        'address' => ['string', 'required'],
        'height' => ['numeric', 'max:255', 'required'],
        'weight' => ['numeric', 'required'],
        'more' => ['json', 'required'],
        // 'mirage_type' => ['string', 'max:255', 'nullable'],
        // 'about' => ['string', 'nullable'],
        // 'income' => ['string', 'max:255', 'nullable'],
        // 'required_specifications' => ['string', 'nullable'],
        // 'smoking' => ['string', 'max:255', 'nullable'],
        // 'beard' => ['string', 'max:255', 'nullable'],
        // 'financial_status' => ['string', 'max:255', 'nullable'],
        // 'health_status' => ['string', 'max:255', 'nullable'],
        // 'skin_colour' => ['string', 'max:255', 'nullable'],
        // 'physique' => ['string', 'max:255', 'nullable'],
        // 'religiosity' => ['string', 'max:255', 'nullable'],
        // 'prayer' => ['string', 'nullable'],
    ];

    protected $guarded = [];

    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }
}
