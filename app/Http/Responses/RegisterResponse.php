<?php

namespace App\Http\Responses;


use Laravel\Fortify\Contracts\RegisterResponse as ContractsRegisterResponse;
use App\Models\CustomerProfile;


class RegisterResponse implements ContractsRegisterResponse
{

    public function toResponse($request)
    {

        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade
        $user = auth()->user();
        $customerInfo = CustomerProfile::find($user->profile_id);
        $token = response()->json(auth()->user()->createToken($request->device_name)->plainTextToken);
        return [
            'user' => $user,
            'token' => $token,
            'customerInfo' => $customerInfo
        ];
    }
}
