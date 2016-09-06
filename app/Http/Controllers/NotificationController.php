<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Visitor;
use PushNotification;
use Carbon\Carbon;
use Log;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notifications = Notification::with('creator')->get();

        return view('notification.index', compact(['notifications']));
    }

    public function store(Request $request)
    {
        $notification = new Notification();
        $notification->message = $request->message;
        $notification->expected_at = Carbon::createFromFormat('d/m/Y - H:i', $request->expected_at);
        $notification->save();

        return redirect()->route('notification.index');
    }

    public function send($id, Request $request)
    {
        $notification = Notification::find($id);
        $visitors = Visitor::whereNotNull('notification_token')->get();
        $devicesArray = [];
        $counter = 1;
        foreach ($visitors as $visitor) {
            array_push($devicesArray, PushNotification::Device($visitor->notification_token));
//                PushNotification::app('appNameIOS')
//                    ->to($visitor->notification_token)
//                    ->send($notification->message);
            Log::info( $visitor->id . " => notification added. ". $counter ."/" . count($visitors));
            $counter = $counter + 1;
        }

        $devices = PushNotification::DeviceCollection($devicesArray);
        $reponses = PushNotification::app('appNameIOS')
            ->to($devices)
            ->send($notification->message);
        Log::info("Notifications sending is successful");
        $notification->sent_at = Carbon::now();
        $notification->save();
        foreach ($reponses->pushManager as $push) {
            $response = $push->getAdapter()->getResponse();
            Log::info("--------");
            Log::info($response);
        }

        return [ 'Success' => 'Başarıyla gönderildi.' ];
    }

    public function destroy($id)
    {
        Notification::destroy($id);
        return 'Success';
    }

}
