<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Visitor;
use PushNotification;
use Carbon\Carbon;

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
        $visitors = Visitor::all();
        $devicesArray = [];
        foreach ($visitors as $visitor) {
            if ($visitor->notification_token != null) {
                array_push($devicesArray, PushNotification::Device($visitor->notification_token));
            }
        }

        $devices = PushNotification::DeviceCollection($devicesArray);
        PushNotification::app('appNameIOS')
            ->to($devices)
            ->send($notification->message);
        $notification->sent_at = Carbon::now();
        $notification->save();
        return [ 'Success' => 'Başarıyla gönderildi.' ];
//        $deviceToken = '7a6484ffcb2f2894550d0f166bde76c4f6d6e5089a77252fc155471ed25278ed';
////        PushNotification::app('appNameIOS')
////            ->to($deviceToken)
////            ->send('Hello World, i`m a push message');

//        $iOS = array(
//            'environment' =>'development',
//            'certificate' => app_path() . '/certificate.pem',
//            'passPhrase'  =>'',
//            'service'     =>'apns'
//        );
//
//        $message = PushNotification::Message('Kafamda bitti',array(
//            'badge' => 63,
//
//            'actionLocKey' => 'Action button title!',
//            'custom' => array('child_id' => 1)
//        ));
//
//        $collection = PushNotification::app($iOS)
//            ->to($deviceToken)
//            ->send($message);
    }

    public function destroy($id)
    {
        Notification::destroy($id);
        return 'Success';
    }

}
