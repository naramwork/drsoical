<?php

namespace App\Http\Controllers;

use App\Models\CustomerProfile;
use App\Models\MarriageRequest;
use App\Models\Message;
use App\Models\User;
use App\Traits\Firebase;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MarriageController extends Controller
{

    use Firebase;
    public function store(Request $request)
    {
        $statue = '';
        $content  = '';
        $attr = $request->validate([
            'sender_id' => 'required|numeric',
            'recipient_id' => 'required|numeric',

        ]);

        $message = Message::where('sender_id', $request->sender_id)
            ->where('recipient_id', $request->recipient_id)->get();
        if ($message->isEmpty()) {
            $statue = 'error';
            $content = 'عليك إرسال رسالة واحدة على الأقل قبل إرسال طلب زواج';
            return ['status' => $statue, 'content' => $content];
        }
        $marriage =  MarriageRequest::create($attr);

        if ($marriage) {
            $statue = 'success';
            $content = 'لقد تم إرسال طلب الزواج بنجاح';
            return ['status' => $statue, 'content' => $content];
            $recipientFcm = $marriage->recipient->profile->fire_base_token;
            if (gettype($recipientFcm) == 'string') {
                $recipientFcm = explode(',', $recipientFcm);
            }
            $this->sendFcmNotification($recipientFcm, 'لديك طلب زواج');
        } else {
            $statue = 'error';
            $content = 'حدث خطأ ما الرجاء المحاولة لاحقا';
            return ['status' => $statue, 'content' => $content];
        }
    }


    public function update(Request $request)
    {

        $request->validate([
            'id' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $marriageRequest = MarriageRequest::find($request->id);

        if (!$marriageRequest) {
            throw ValidationException::withMessages([
                'no-marriage-request' => ['يوجد خطأ ما الرجاء المحاولة لاحقا'],
            ]);
        }

        $senderFcm = $marriageRequest->sender->profile->fire_base_token;
        if (gettype($senderFcm) == 'string') {
            $senderFcm = explode(',', $senderFcm);
        }

        if ($request->status == 'إلغاء') {

            $marriageRequest->status = $request->status;
            return $marriageRequest->save();
            $this->sendFcmNotification($senderFcm, ' لقد تم ' . $request->status . ' طلب الزواج ');
        } else {
            $marriageRequest->status = $request->status;
            $marriageRequest->save();
            $this->sendFcmNotification($senderFcm, ' لقد تم ' . $request->status . ' طلب الزواج الخاص بك');
        }
    }


    public function show($id)
    {
        $senderMessage = MarriageRequest::where('sender_id', $id)->get()->groupBy('recipient_id');
        $recipientMessage = MarriageRequest::where('recipient_id', $id)->get()->groupBy('sender_id');
        return collect(['send' => $senderMessage, 'receive' => $recipientMessage]);
    }


    public function get_random(String $gender)
    {
        return CustomerProfile::with(['user'])->inRandomOrder()->Where('gender', '!=', $gender)->take(10)->get();
    }



    public function sendFcmNotification(array $tokenList, String $body)
    {

        $extraNotificationData = [
            "body" => $body,
            "title" => "طلب زواج"
        ];

        $fcmNotification = [
            'registration_ids' => $tokenList, //multple token array
            // 'to'        => "/topics/messaging", //single token

            'notification' => $extraNotificationData
        ];

        return $this->firebaseNotification($fcmNotification);
    }
}
