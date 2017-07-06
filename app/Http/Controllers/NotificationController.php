<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Visitor, App\Exam;
use Carbon\Carbon;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notifications = Notification::orderBy('id', 'DESC')->with('creator', 'exam')->get();
        $exams = Exam::orderBy('date')->where('date', '>', Carbon::now())->get()->pluck('abb', 'id');
        return view('notification.index', compact(['notifications', 'exams']));
    }

    public function store(Request $request)
    {
        info($request->all());
        return $request->all();
        $notification = new Notification();
        $notification->message = $request->message;
        $notification->expected_at = Carbon::createFromFormat('d/m/Y - H:i', $request->expected_at);
        // if($request->has('exam_id')) $notification->exam_id = $request->exam_id;
        // else $notification->exam_id = null;
        $notification->save();


        session()->flash('success_message', '<strong>' . $notification->message . '</strong> başarıyla gönderildi.');
        return redirect()->route('notification.index');
    }

    public function send($id, Request $request)
    {
      sleep(5);
      $notification->sent_at = Carbon::now();
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

        return [
          'status' => 'success',
          'message' => 'Başarıyla gönderildi.',
          'count' => 100,
       ];
    }

    public function destroy($id)
    {
        Notification::destroy($id);
        return 'Success';
    }
}
