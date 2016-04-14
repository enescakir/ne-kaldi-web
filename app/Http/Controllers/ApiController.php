<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Exam, App\Visit, App\Visitor;
use Log;
class ApiController extends Controller
{
    public function exams(){
        $exams['exams'] = Exam::activated()->orderBy('date')->get();
        return $exams;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function visit(Request $request ){
        if ($request->exam_id == '0'){
            return 'Its default';
        }

        $request['ip_address'] = $request->ip();
        $visitor = Visitor::firstOrCreate($request->only(['device_id','ip_address','platform','via']));
        $request['visitor_id'] = $visitor->id;
        $visit = Visit::create($request->only(['visitor_id', 'exam_id']));
        return 'Success';
    }

    public function updateName( Request $request ){
        $visitor = Visitor::firstOrCreate( [ 'device_id' => $request->device_id, 'ip_address'=> $request->ip() ]);
        $visitor->name = $request->name;
        $visitor->save();
        return 'Success';
    }

}
