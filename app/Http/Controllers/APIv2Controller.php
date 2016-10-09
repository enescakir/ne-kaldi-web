<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Exam, App\Visit, App\Visitor, App\Favorite, App\VisitorAction, App\CustomExam, App\Ticket;
use Log, Carbon\Carbon;

class APIv2Controller extends Controller
{
    public function exams(Request $request)
    {
        if ($request->has("after")) {
            $exams['exams'] = Exam::activated()
                ->where('date', '>=', Carbon::now())
                ->where('created_at', '>=', Carbon::parse($request->after))
                ->orderBy('date')
                ->get();
            $exams['updated'] = Exam::activated()
                ->where('date', '>=', Carbon::now())
                ->where('updated_at', '>=', Carbon::parse($request->after))
                ->orderBy('date')
                ->get();
            $exams['deleted'] = Exam::withTrashed()
                ->where('deleted_at', '>=', Carbon::parse($request->after))
                ->orWhere([
                    ['updated_at', '>=', Carbon::parse($request->after)],
                    ['activated', 0]
                ])
                ->orderBy('date')
                ->get();


        }
        else {
            $exams['exams'] = Exam::activated()
                ->where('date', '>=', Carbon::now())
                ->orderBy('date')
                ->get();
            $exams['updated'] = [];
            $exams['deleted'] = [];
        }

        return $exams;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function unsubscribe(Request $request)
    {
        $visitor = Visitor::where('device_id', $request->device_id)->first();
        if ($visitor != null) {
            $visitor->notification_token = null;
            $visitor->save();
        }

        return 'Success';
    }

    public function subscribe(Request $request)
    {
        $visitor = Visitor::firstOrCreate($request->only(['device_id']));
        $visitor->platform = $request->platform;
        $visitor->via = $request->via;
        $visitor->notification_token = $request->notification_token;
        $visitor->save();

        return 'Success';
    }

    public function visit(Request $request)
    {
        $visitor = Visitor::firstOrCreate($request->only(['device_id']));
        $visitor->platform = $request->platform;
        $visitor->via = $request->via;
        $visitor->api_version = $request->api_version;
        $visitor->save();
        $request['visitor_id'] = $visitor->id;
        $visit = Visit::create($request->only(['visitor_id', 'exam_id']));

        return 'Success';
    }

    public function favorite(Request $request)
    {
        $visitor = Visitor::firstOrCreate($request->only(['device_id']));
        $visitor->platform = $request->platform;
        $visitor->via = $request->via;
        $visitor->save();
        $request['visitor_id'] = $visitor->id;

        $favorite = Favorite::withTrashed()->where('visitor_id', $request->visitor_id)->where('exam_id', $request->exam_id)->first();
        if ($favorite == null) {
            $favorite = Favorite::create($request->only(['visitor_id', 'exam_id']));
        }
        $favorite->save();

        if ($request->favorite == 1) {
            if ($favorite->trashed()) {
                $favorite->restore();
            }
        }
        else if ($request->favorite == 0) {
            $favorite->delete();
        }
        return 'Success';
    }

    public function visitorAction(Request $request)
    {
        $visitor = Visitor::firstOrCreate($request->only(['device_id']));
        $visitor->platform = $request->platform;
        $visitor->via = $request->via;
        $visitor->save();
        $visitor->actions()->save(new VisitorAction(['action' => $request->action]));

        return 'Success';
    }

    public function exam(Request $request){
        $visitor = Visitor::firstOrCreate($request->only(['device_id']));
        $visitor->platform = $request->platform;
        $visitor->via = $request->via;
        $visitor->save();
        $exam = new CustomExam();
        $exam->name = $request->exam_name;
        $exam->abb = $request->exam_abb;
        $exam->date = $request->exam_date;
        $exam->visitor_id = $visitor->id;
        if($request->has('exam_desc')) $exam->desc = $request->exam_desc;
        $exam->save();
        return 'Success';
    }

    public function message(Request $request){
        $visitor = Visitor::firstOrCreate($request->only(['device_id']));
        $visitor->platform = $request->platform;
        $visitor->via = $request->via;
        $visitor->name = $request->name;
        $visitor->email = $request->email;
        $visitor->save();

        $ticket = new Ticket();
        $ticket->message = $request->message;
        $ticket->visitor_id = $visitor->id;
        $ticket->save();
        return 'Success';
    }

}
