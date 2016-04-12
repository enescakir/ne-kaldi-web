<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Exam;

class ApiController extends Controller
{
    public function exams(){
        $exams['exams'] = Exam::orderBy('date')->get();
        return $exams;
    }
}
