<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Visitor, App\Exam;
use PushNotification;
use Carbon\Carbon;
use Log, Session;

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
        $filter = [];
        $notification = new Notification();
        $notification->message = $request->message;
        $notification->expected_at = Carbon::createFromFormat('d/m/Y - H:i', $request->expected_at);
        $notification->sent_at = Carbon::now();
        if($request->has('exam_id')) $notification->exam_id = $request->exam_id;
        else $notification->exam_id = null;
        $notification->save();


        $content = array(
            "en" => $notification->message
        );

        if($request->has('exam_id')){
            $fields = array(
                'app_id' => "2d0f5f92-cd98-4b3e-93ac-418a807c52dd",
                'filters' => array(["field" => "tag", "key" => "exam-" . $notification->exam_id, "relation" => "exists"]),
                'contents' => $content
            );
        }
        else {
            $fields = array(
                'app_id' => "2d0f5f92-cd98-4b3e-93ac-418a807c52dd",
                'included_segments' => array('All'),
                'contents' => $content
            );
        }



        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic YWZiNDQ0ZWQtNmQ4MS00OGFiLWJkMjAtNWYyODU1YjAzNWRk'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        Session::flash('success_message', '<strong>' . $notification->message . '</strong> başarıyla gönderildi.');
        return redirect()->route('notification.index');
    }

    public function send($id, Request $request)
    {
//        $notification = Notification::find($id);
//        Log::info("Notification #" . $notification->id . " sending is started.");
//        $visitors = [];
//        if($notification->exam_id == null)
//            $visitors = Visitor::whereNotNull('notification_token')->lists('notification_token');
//        else
//            $visitors = Exam::whereId($notification->exam_id)->first()->favoriters()->whereNotNull('notification_token')->lists('notification_token');
//
//        $devicesArray = [];
//        $counter = 1;
//        foreach ($visitors as $visitor) {
//            array_push($devicesArray, PushNotification::Device($visitor));
//            Log::info("Notification #" . $notification->id . " => " . $counter ."/" . count($visitors) . " added.");
//            $counter = $counter + 1;
//        }
//        $devices = PushNotification::DeviceCollection($devicesArray);
//        $message = PushNotification::Message($notification->message);
//        $collection = PushNotification::app('appNameIOS')->to($devices)->send($message);
//        Log::info("Notification #" . $notification->id . " sending is successful.");
//        $notification->sent_at = Carbon::now();
//        $notification->save();
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
