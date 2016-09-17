<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Visit;
use DB;

class VisitController extends Controller
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
        $visits = Visit::orderBy('created_at')->with('exam','visitor')->get();
        $exams = Exam::select('abb')->withCount('visits')->orderBy('visits_count', 'desc')->get()->groupBy('abb');

        // $examsCollection = Exam::select('abb')->withCount('visits')->orderBy('visits_count', 'desc')->get()->groupBy('abb');
    //     $exams = [];
    //     foreach( $examsCollection as $abb=>$exam ){
    //         if( strpos($abb, "e-YDS") === 0){
    //             $eYDS = [];
    //             foreach( $exams as $examArray){
    //                 if( $examArray["abb"] == "e-YDS"){
    //                     $eYDS = $examArray;
    //                 }
    //             }
    //             if( count($eYDS) > 0){
    //                 $eYDS["visits_count"] += $exam->sum('visits_count');
    //             }
    //             else {
    //                 $eYDS = [ "abb" => "e-YDS", "visits_count" => $exam->sum('visits_count')];
    //                 array_push($exams, $eYDS);
    //             }

    //         }
    //         else{
    //             array_push($exams, [ "abb" => $abb, "visits_count" => $exam->sum('visits_count')]);
    //         }
    //     }
    //     usort($exams, function($a, $b) {
    //         return $b['visits_count'] - $a['visits_count'];
    //     });
    //     return view('visits.index', compact(['visits', 'exams']));

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
