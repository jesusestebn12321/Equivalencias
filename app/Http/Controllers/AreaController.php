<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\Area;
use Equivalencias\Address;
use Equivalencias\Career;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $area=Area::all();
        $address=Address::all();
        $career=Career::all();
        return view('areas.index',compact('area','address','career'));
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
    public function store(Request $request){

        // for($i=0;$i<array_push($request);$i++) {
        
        // }
        $i=count($request->request)-2;
        for($x=1;$x<$i;$x++) {
            $slug=str_slug($request->area.'-'.$request->address_id.'_'.rand());
            $area=Area::create([
                'area'=>$request->area,
                'address_id'=>$request->address_id,
                'career_id'=>$request->career.$x,
                'slug'=>$slug,
            ]);
        }
        return back()->with('success','Exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Equivalencias\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $area=Area::Where('career_id','=',$id)->get();
        return $area;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Equivalencias\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Equivalencias\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Equivalencias\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function delete($slug){
        $area=Area::Where('slug','=',$slug)->firstOrFail();
        $area->delete();
        return back()->with('success','Exito');
    }
}
