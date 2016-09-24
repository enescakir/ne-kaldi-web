<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Exam, App\Visit, App\Visitor, App\Favorite;
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

        }
        else {
            $exams['exams'] = Exam::activated()
                ->where('date', '>=', Carbon::now())
                ->orderBy('date')
                ->get();
        }

        return $exams;

//        public function scopeApplicationNews($query, $after)
//    {
//
//        if ($after == null)
//            $query->active()->orderby('sent_at');
//
//        else
//            $query->active()
//                ->where('sent_at', '>=', Carbon::parse($after))
//                ->orderby('sent_at');
//    }
//
//        public function scopeApplicationUpdates($query, $after)
//    {
//        if ($after != null)
//            $query->active()
//                ->where('updated_at', '>=', Carbon::parse($after))
//                ->orderby('sent_at');
//        else
//            $query->active()
//                ->where('id', null);
//    }

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
        if ($request->exam_id == '0') {
            return 'Its default';
        }

        $visitor = Visitor::firstOrCreate($request->only(['device_id']));
        $visitor->platform = $request->platform;
        $visitor->via = $request->via;
        $visitor->save();
        $request['visitor_id'] = $visitor->id;
        $visit = Visit::create($request->only(['visitor_id', 'exam_id']));

        return 'Success';
    }

    public function favorite(Request $request)
    {
        if ($request->exam_id == '0') {
            return 'Its default';
        }

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

}
