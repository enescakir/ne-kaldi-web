<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Visitor, App\Exam;
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
        $notifications = Notification::with('creator', 'exam')->get();
        $exams = Exam::orderBy('date')->where('date', '>', Carbon::now())->get();
        return view('notification.index', compact(['notifications', 'exams']));
    }

    public function store(Request $request)
    {
        $notification = new Notification();
        $notification->message = $request->message;
        $notification->expected_at = Carbon::createFromFormat('d/m/Y - H:i', $request->expected_at);
        if($request->has('exam_id')) $notification->exam_id = $request->exam_id;
        else $notification->exam_id = null;
        $notification->save();

        return redirect()->route('notification.index');
    }

    public function send($id, Request $request)
    {
        $notification = Notification::find($id);
        Log::info("Notification #" . $notification->id . " sending is started.");
        $visitors = [];
        if($notification->exam_id == null)
            $visitors = Visitor::whereNotNull('notification_token')->lists('notification_token');
        else
            $visitors = Exam::whereId($notification->exam_id)->first()->favoriters()->whereNotNull('notification_token')->lists('notification_token');

        $devicesArray = [];
        $counter = 1;
        foreach ($visitors as $visitor) {
            array_push($devicesArray, PushNotification::Device($visitor));
            Log::info("Notification #" . $notification->id . " => " . $counter ."/" . count($visitors) . " added.");
            $counter = $counter + 1;
        }
        $devices = PushNotification::DeviceCollection($devicesArray);
        $message = PushNotification::Message($notification->message);
        $collection = PushNotification::app('appNameIOS')->to($devices)->send($message);
        Log::info("Notification #" . $notification->id . " sending is successful.");
        $notification->sent_at = Carbon::now();
        $notification->save();
        return [ 'Success' => 'Başarıyla gönderildi.' ];
    }

    public function destroy($id)
    {
        Notification::destroy($id);
        return 'Success';
    }


    public function test(Request $request)
    {

//        $devices = PushNotification::DeviceCollection(array(
//            PushNotification::Device('966bc82c72c9fe3fcfda23e5f83164e4ab5c73a49a88282772adda83240c8674'),
//            PushNotification::Device('8cff313029afd1967f28370eb899b379ddc4b0a604c52edd771001c23e641f41'),
//            PushNotification::Device('f40519b8e2f35e69dcddc9eac7295234fed96692d0c959329fccdbcea50cb3aa')
//        ));
//        $message = PushNotification::Message('Ne Kaldı? Test');
//        $collection = PushNotification::app('appNameIOS')->to($devices)->send($message);
//        dd($collection);

    }

}
