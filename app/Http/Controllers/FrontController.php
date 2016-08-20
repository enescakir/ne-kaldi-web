<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Exam;
use Carbon\Carbon;

class FrontController extends Controller
{
    //

    public function home(){
        $exams = Exam::activated()->orderBy('date')->where('date', '>=', Carbon::now())->get();

        return view('welcome', compact(['exams']));
    }

}
