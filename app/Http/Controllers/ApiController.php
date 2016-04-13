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
        $request['visitor_id'] = $visitor->id;
        Visitor::where('device_id', $request->get('device_id'))->where('ip_adress', $request->ip())->firstOrCreate($request->all());
        return 'Success';
    }

    public function updateName( Request $request ){
        Visitor::where('device_id', $request->get('device_id')->where('ip_adress', $request->ip())->firstOrCreate( $request->all());
        return 'Success';
    }

}
