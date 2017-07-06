<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Exam, App\CustomExam;
use Carbon\Carbon;
use Session;

class ExamController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function customs()
  {
    $exams = CustomExam::orderBy('id', 'desc')->paginate(100);
    return view('exams.customs', compact(['exams']));
  }

  public function index(Request $request)
  {

    if ($request->passed == 1) {
      $exams = Exam::withCount('visits', 'favorites')->orderBy('date', 'DESC')->passed()->get();
    } else {
      $exams = Exam::withCount('visits', 'favorites')->orderBy('date')->current()->get();
    }
    return view('exams.index', compact(['exams']));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('exams.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $exam = new Exam();
    $exam->name = $request->input('name');
    $exam->abb = $request->input('abb');
    $exam->date = $request->input('date');
    if($request->has('start'))  $exam->start = $request->input('start');
    else $exam->start = null;
    if($request->has('end'))  $exam->end = $request->input('end');
    else $exam->end = null;
    if($request->has('fee'))  $exam->fee = $request->input('fee');
    else $exam->fee = null;
    if($request->has('validity'))  $exam->validity = $request->input('validity');
    else $exam->validity = null;
    if($request->has('desc'))  $exam->desc = $request->input('desc');
    else $exam->desc = null;
    $exam->save();
    Session::flash('success_message','<strong>' . $exam->name . '</strong> başarıyla eklendi.');
    return redirect()->route('exams.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(Exam $exam)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(Exam $exam)
  {
    return view('exams.edit', compact(['exam']));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Exam $exam)
  {
    $exam->name = $request->input('name');
    $exam->abb = $request->input('abb');
    $exam->date = $request->input('date');
    if($request->has('start'))  $exam->start = $request->input('start');
    else $exam->start = null;
    if($request->has('end'))  $exam->end = $request->input('end');
    else $exam->end = null;
    if($request->has('fee'))  $exam->fee = $request->input('fee');
    else $exam->fee = null;
    if($request->has('validity'))  $exam->validity = $request->input('validity');
    else $exam->validity = null;
    if($request->has('desc'))  $exam->desc = $request->input('desc');
    else $exam->desc = null;
    $exam->save();
    Session::flash('success_message', '<strong>' . $exam->name . '</strong> başarıyla düzenlendi.');
    return redirect()->route('exams.index');
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function activate(Exam $exam)
  {
    $exam->activated = !($exam->activated);
    $exam->save();
    return $exam->activated ? 1 : 0;
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Exam $exam)
  {
    $exam->delete();
    return $exam;
  }
}
