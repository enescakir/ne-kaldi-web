<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Exam;

class FrontController extends Controller
{
    //

    public function home(){
        $exams = Exam::activated()->orderBy('date')->get();

        return view('welcome', compact(['exams']));
    }

}
