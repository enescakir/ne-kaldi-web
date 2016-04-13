<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Exam, App\Visit, App\Visitor;

class ApiController extends Controller
{
    public function exams(){
        $exams['exams'] = Exam::orderBy('date')->get();
        return $exams;
    }

    public function visit( Request $request ){
        $request['ip_adress'] = $request->ip();
        $visitor = Visitor::firstOrCreate($request->only(['device_id','ip_adress']));
        $request['visitor_id'] = $visitor->id;
        $visit = Visit::firstOrCreate($request->only(['visitor_id', 'exam_id']));
        return 'Success';
    }

    public function updateName( Request $request ){
        $visitor = Visitor::firstOrCreate( [ 'device_id' => $request->device_id, 'ip_adress'=> $request->ip() ]);
        $visitor->name = $request->name;
        $visitor->save();
        return 'Success';
    }

}
