<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Favorite, App\Exam;
use DB;

class FavoriteController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $favoritesCount = Favorite::count();
    $favoritesPerExam = Exam::select('category')
    ->withCount('favorites')
    ->groupBy('category')
    ->orderBy('favorites_count', 'DESC')
    ->get()
    ->toArray();

    $favoritesDaily = Favorite::groupBy('date')
    ->orderBy('date')
    ->get(array(
      DB::raw('DATE(`created_at`) AS `date`'),
      DB::raw('COUNT(*) as `value`')
    ));

    return view('favorites.index', compact(['favoritesCount', 'favoritesPerExam', 'favoritesDaily']));
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
