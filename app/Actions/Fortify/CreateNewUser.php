<?php

namespace App\Actions\Fortify;

use App\Models\AdminProfile;
use App\Models\CustomerProfile;
use App\Models\User;
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

        $type = $input['type'] ?? '';
        $attr = $input;
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
        $this->addToProfile($user, $type, $attr);

        return $user;
    }

    private function addToProfile($user, $type, $attr)
    {
        if ($user != null && $user->exists()) {
            if ($type == 'user') {
                $userProfile = CustomerProfile::create($attr);
                if ($userProfile->exists()) {
                    $userProfile->user()->save($user);
                } else {
                    $user->delete();
                }
            } else {
                $admin = AdminProfile::create([
                    'email' => $attr['email'],
                ]);
                if ($admin->exists()) {
                    $admin->user()->save($user);
                } else {
                    $user->delete();
                }
            }
        }
    }
}
