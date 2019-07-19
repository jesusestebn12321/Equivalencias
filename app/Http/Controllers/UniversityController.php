<?php

namespace Equivalencias\Http\Controllers;

use Equivalencias\University;
use Equivalencias\Address;
use Illuminate\Http\Request;
use Equivalencias\Http\Requests\UniversityCreateRequest;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $university=University::all();
        $address=Address::all();
        return view('university.index',compact('university','address'));
    }

   
    public function store(UniversityCreateRequest $request){
        $slug=str_slug($request->university.'-'.$request->address_id.'_'.rand());
        $university=University::create([
            'university'=>$request->university,
            'address_id'=>$request->address_id,
            'slug'=>$slug,
    ]);
        return back()->with('success','Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Equivalencias\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
    }

    public function update(Request $request,$id){
        // dd($request);
        $university=University::Where('id','=',$request->id)->firstOrFail();
        $university->university=$request->university;
        $university->address_id=$request->address_id;
        $university->save();
        return $university;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Equivalencias\University  $university
     * @return \Illuminate\Http\Response
     */
    public function delete($slug){
        $university=University::Where('slug','=',$slug)->firstOrFail();
        $university->delete();
        return back()->with('success','Exito');
    }
}
