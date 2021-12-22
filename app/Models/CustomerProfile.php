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
        'social_status' => ['string', 'max:255', 'required'],
        'city' => ['string', 'max:255', 'required'],
        'nationality' => ['string', 'max:255', 'required'],
        'civil_id_no' => ['string', 'max:255', 'required'],
        'fire_base_token' => ['required'],
        'birthdate' => ['date', 'max:255', 'required'],
        'height' => ['numeric', 'max:255', 'required'],
        'weight' => ['numeric', 'required'],

        'fullName' => ['string', 'max:255', 'required'],
        'country' => ['string', 'max:255', 'required'],
        'smoking' => ['string', 'max:255', 'required'],
        'beard' => ['string', 'max:255', 'required'],
        'religion' => ['string', 'max:255', 'required'],
        'financialStatus' => ['string', 'max:255', 'required'],
        'skinColour' => ['string', 'max:255', 'required'],
        'physique' => ['string', 'max:255', 'required'],
        'religiosity' => ['string', 'max:255', 'required'],
        'employment' => ['string', 'max:255', 'required'],
        'healthStatus' => ['string', 'max:255', 'required'],
        'specifications' => ['string', 'max:255', 'required'],
        'income' => ['string', 'max:255', 'required'],
        'aboutYou' => ['string', 'max:255', 'required'],
        'image_url' => ['string', 'max:255', 'required'],
        'educational' => ['string', 'max:255', 'required'],
        'prayer' => ['string', 'required'],
    ];



    protected $guarded = [];

    public function user()
    {
        return $this->morphOne(User::class, 'profile')->setEagerLoads([]);
    }
}
