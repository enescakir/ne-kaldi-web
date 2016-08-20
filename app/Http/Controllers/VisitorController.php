<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Visitor, App\Visit, DB;

class VisitorController extends Controller
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
        $visitors = Visitor::orderBy('created_at')->paginate(15);
        $visitorDevices = DB::table('visitors')
            ->select('via', DB::raw('count(*) as total'))
            ->groupBy('via')
            ->orderBy('total', 'desc')
            ->get();
        return view('visitors.index', compact(['visitors', 'visitorDevices']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitor = Visitor::find($id);
        $visitor->visits()->delete();
        $visitor->delete();
        return 'Success';
    }

}
