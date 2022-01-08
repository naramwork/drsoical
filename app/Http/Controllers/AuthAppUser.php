<?php

namespace App\Http\Controllers;

use App\Models\CustomerProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthAppUser extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['معلومات الدخول غير صحيحة الرجاء التأكد والمحاولة لاحقا '],
            ]);
        }
        // if ($user->isBlocked) {
        //     throw ValidationException::withMessages([
        //         'block' => ['لقد تم حظر حسابك'],
        //     ]);
        // }
        $toke = $user->createToken($request->device_name)->plainTextToken;

        return [
            'user' => $user,
            'toke' => $toke,
        ];
    }

    public function refreshUserData(int $id)
    {
        return User::find($id);
    }

    public function logout(Request $request)
    {

        $request->validate([
            'email' => 'required|email',

        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $user->tokens()->delete();
        return 'done';
    }


    public function update_fcm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'fire_base_token' => 'required|string',
        ]);
        $user = User::firstWhere('email', $request->email);
        $fcmString = $user->profile->fire_base_token;
        if (gettype($fcmString) == 'string') {
            $newArray = explode(',', $fcmString);
        } else {
            $newArray = $fcmString;
        }
        $newArray[] = $request->fire_base_token;

        $user->profile->fire_base_token = $newArray;
        return $user->profile->save();
    }

    public function check_user_exists(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'value' => 'required|string',
        ]);

        if ($request->name == 'email') {
            $user = User::where($request->name, $request->value)->first();
        } else {
            $user = CustomerProfile::where($request->name, $request->value)->first();
        }
        if ($user) {
            $message = $request->name == 'email' ? "بريد الإلكتروني" : "رقم الهاتف";
            throw ValidationException::withMessages([
                'no_user' => [' أن ' . 'ال' . $message . ' المختار مستخدم الرجاء اختيار ' . $message . ' اخر والمحاولة مرة أخرى'],
            ]);
        }

        return true;
    }

    public function refresh_fcm($id)
    {
        $user = User::find($id);
        $token = $user->profile->fire_base_token;
        if ($token != null) {
            return ['fire_base_token' => $token];
        } else {
            return ['error' => 'لايوجد مستخدم بهذا ال id الرجاء المحاولة لاحقا'];
        }
    }
}
