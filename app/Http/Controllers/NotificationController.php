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

  public function index(Request $request)
  {
    $notifications = Notification::custom($request->has('is_custom') ? $request->is_custom : 1)
      ->orderBy('id', 'DESC')
      ->with('creator', 'exams')
      ->paginate(20);
    $exams = Exam::orderBy('date')->where('date', '>', Carbon::now())->get()->pluck('abb', 'id');
    return view('notification.index', compact(['notifications', 'exams']));
  }

  public function store(Request $request)
  {
    $notification = new Notification();
    $notification->message = $request->message;
    $notification->is_custom = true;
    if($request->expected_at)
      $notification->expected_at = Carbon::createFromFormat('d/m/Y - H:i', $request->expected_at);
    else
      $notification->expected_at = Carbon::now();
    $notification->save();
    if ($request->exams) {
      $notification->exams()->sync($request->exams);
    }
    if ($request->ajax()) {
      return $notification;
    }
    session()->flash('success_message', '<strong>' . $notification->message . '</strong> başarıyla gönderildi.');
    return redirect()->route('notification.index');
  }

  public function send(Notification $notification)
  {
    $count = $notification->send();
    return [
      'status' => 'success',
      'message' => 'Başarıyla gönderildi.',
      'count' => $count,
    ];
  }

  public function destroy(Notification $notification)
  {
    $notification->delete();
    return $notification;
  }
}
