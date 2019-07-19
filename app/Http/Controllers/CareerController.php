<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $career=Career::all();
        return view('career.index',compact('career'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $slug=str_slug($request->modalidad.'-'.$request->career.'_'.rand());
        // dd($request);
        $career=Career::create(['career'=>$request->career,'modalidad'=>$request->modalidad,'slug'=>$slug]);
        return back()->with('success','Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Equivalencias\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $career=Career::where('area_id','=',$id)->get();

        return $career;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Equivalencias\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Equivalencias\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Equivalencias\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function delete($slug){
        $career=Career::where('slug','=',$slug)->firstOrFail();
        $career->delete();
        return back()->with('success','Exito');
    }
}
