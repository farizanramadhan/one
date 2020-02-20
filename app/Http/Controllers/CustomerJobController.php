<?php

namespace App\Http\Controllers;

use App\CustomerJob;
use Illuminate\Http\Request;
use Auth;
class CustomerJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $data = CustomerJob::all();
         return view('customerjob.home',compact('data'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('customerjob.create');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         
         $data= CustomerJob::create([
             'name' => $request->name,
             'created_by' =>  Auth::user()->email,
             'updated_by' =>  Auth::user()->email,
         ]);
         return redirect()->route('customerjob.index')
                       ->with('success','Data created successfully.');
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\customerjob  $customerjob
      * @return \Illuminate\Http\Response
      */
     public function show(CustomerJob $customerjob)
     {
         return view('customerjob.show',compact('customerjob'));
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\customerjob  $customerjob
      * @return \Illuminate\Http\Response
      */
     public function edit(CustomerJob $customerjob)
     {
         return view('customerjob.edit',compact('customerjob'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\customerjob  $customerjob
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, CustomerJob $customerjob)
     {
         $request->validate([
             'name' => 'required',
         ]);
         $customerjob->update(['name' => $request->name]);

         return redirect()->route('customerjob.index')
                         ->with('success','Data updated successfully.');
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\customerjob  $customerjob
      * @return \Illuminate\Http\Response
      */
     public function destroy(CustomerJob $customerjob)
     {
         $customerjob->delete();
         return redirect()->route('customerjob.index')
                         ->with('success','Data deleted successfully');
     }
}
