<?php

namespace App\Actions\Fortify;

use App\Models\AdminProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {


        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        if ($user != null && $user->exists()) {
            if ($input['type'] == 'user') {
                $attr =  Validator::make($input, UserProfile::$createRules)->validate();
                $userProfile = UserProfile::create($attr);
                $userProfile->user()->save($user);
            } else {
                $admin = AdminProfile::create([
                    'email' => $input['email'],
                ]);
                $admin->user()->save($user);
            }
        }
        return $user;
    }
}
