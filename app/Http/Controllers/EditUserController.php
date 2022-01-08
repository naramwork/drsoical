<?php

namespace App\Http\Controllers;

use App\Models\User;
use Clockwork\Storage\Storage;
use Illuminate\Http\Request;

class EditUserController extends Controller
{
    public function addimage(Request $request)
    {

        $user = User::find($request->id);
        if (is_file(storage_path('app/public/images/' . $user->profile->image_url))) {

            // 2. possibility
            unlink(storage_path('app/public/images/' . $user->profile->image_url));
        }
        if ($request->hasFile('image')) {

            $path = $request->file('image')->store("public/images");
            $user->profile->image_url = pathinfo($path)['basename'];
        }
        $user->profile->save();
        return $user->profile->image_url;
    }


    public function editUserData(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'prop' => 'required',
            'value' => 'required',
        ]);
        $user = User::find($request->id);
        $user->profile->{$request->prop} = $request->value;
        return $user->profile->save();
    }
}
