<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Exam, App\Visit;

class ApiController extends Controller
{
    public function exams(){
        $exams['exams'] = Exam::orderBy('date')->get();
        return $exams;
    }

    public function visit( Request $request ){
        $visit = new Visit();
        $visit->ip_adress = Request::ip();
        $visit->device_id = $request->get('device_id');
        $visit->platform = $request->get('platform');
        $visit->name = $request->get('name');
        $visit->exam_id = $request->get('exam_id');
        $visit->save();

        return response()->setStatusCode(200, 'Visit succesfully stored.');
    }
}
