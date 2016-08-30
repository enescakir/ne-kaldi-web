<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Exam;
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
    public function index()
    {
        $exams = Exam::withCount('visits', 'favorites')->orderBy('date')->where('date', '>', Carbon::now())->get();
        $passed_exams = Exam::withCount('visits', 'favorites')->orderBy('date')->where('date', '<=', Carbon::now())->get();
        return view('exams.index', compact(['exams', 'passed_exams']));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);
        return view('exams.edit', compact(['exam']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::find($id);
        $exam->name = $request->input('name');
        $exam->abb = $request->input('abb');
        $exam->date = $request->input('date');
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
    public function activate($id)
    {
        $exam = Exam::find($id);
        $exam->activated = !($exam->activated);
        $exam->save();
        return 'Success';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exam::destroy($id);
        return 'Success';
    }
}
