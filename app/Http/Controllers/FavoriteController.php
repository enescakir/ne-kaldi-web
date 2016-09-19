<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Favorite, App\Exam;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = Favorite::orderBy('created_at')->with('exam','visitor')->get();
//        $exams = Exam::select('abb')->withCount('favorites')->orderBy('favorites_count', 'desc')->get()->groupBy('abb');

        $examsCollection = Exam::select('abb')->withCount('favorites')->orderBy('favorites_count', 'desc')->get()->groupBy('abb');
        $exams = [];
        foreach( $examsCollection as $abb=>$exam ){
            if( strpos($abb, "e-YDS") === 0){
                $eYDS = [];
                foreach( $exams as $examArray){
                    if( $examArray["abb"] == "e-YDS"){
                        $eYDS = $examArray;
                    }
                }
                if( count($eYDS) > 0){
                    $eYDS["favorites_count"] += $exam->sum('favorites_count');
                }
                else {
                    $eYDS = [ "abb" => "e-YDS", "favorites_count" => $exam->sum('favorites_count')];
                    array_push($exams, $eYDS);
                }

            }
            else{
                array_push($exams, [ "abb" => $abb, "favorites_count" => $exam->sum('favorites_count')]);
            }
        }
        usort($exams, function($a, $b) {
            return $b['favorites_count'] - $a['favorites_count'];
        });
        return view('favorites.index', compact(['favorites', 'exams']));
    }

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
