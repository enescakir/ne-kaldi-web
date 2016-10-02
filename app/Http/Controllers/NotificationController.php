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
        $visitors = [];
        if($notification->exam_id == null) {
            $visitors = Visitor::whereNotNull('notification_token')->get();
        } else {
            $exam = Exam::whereId($notification->exam_id)->with(['favorites','favorites.visitor'])->first();
            foreach($exam->favorites as $favorite){
                if($favorite->visitor->notification_token != null)
                    array_push($visitors, $favorite->visitor);
            }
        }

        $devicesArray = [];
        $counter = 1;
        foreach ($visitors as $visitor) {
                PushNotification::app('appNameIOS')
                    ->to($visitor->notification_token)
                    ->send($notification->message);
            Log::info( $visitor->id . " => notification #" . $notification->id . " sent. ". $counter ."/" . count($visitors));
            $counter = $counter + 1;
        }

        Log::info("Notification #" . $notification->id . " sending is successful");
        $notification->sent_at = Carbon::now();
        $notification->save();

        return [ 'Success' => 'Başarıyla gönderildi.' ];
    }

    public function destroy($id)
    {
        Notification::destroy($id);
        return 'Success';
    }

}
