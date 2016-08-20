<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Exam, App\Visit, App\Visitor;
use Log, Carbon\Carbon;
class ApiController extends Controller
{
    public function exams(){
        $exams['exams'] = Exam::activated()->orderBy('date')->where('date', '>=', Carbon::now())->get();
        return $exams;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function unsubscribe(Request $request){
        $visitor = Visitor::where('device_id', $request->device_id)->first();
        if($visitor != null){
            $visitor->notification_token = null;
            $visitor->save();
        }
        return 'Success';
    }

    public function subscribe(Request $request){
        $visitor = Visitor::firstOrCreate($request->only(['device_id']));
        $visitor->platform = $request->platform;
        $visitor->via = $request->via;
        $visitor->notification_token = $request->notification_token;
        $visitor->save();
        return 'Success';
    }

    public function visit(Request $request ){
        if ($request->exam_id == '0'){
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
}
