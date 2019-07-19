<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\MatterUser;
use Equivalencias\Matter;
use Equivalencias\Career;
use Equivalencias\Area;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matter_user=MatterUser::where('user_id','=',Auth::user()->id)->first();
        if (!isset($matter_user)) {
            $area= Area::all();
            $matter= Matter::all();
            $career= Career::all();
            return view('home',compact('matter_user','matter','area','career'));
        } else {
            # code...
            return view('home',compact('matter_user'));
        }
        

    }
}
