<?php

namespace App\Http\Controllers;

use App\Kavling;
use App\Project;
use Illuminate\Http\Request;
use Auth;
class KavlingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kavling::with('project')->get();
        return view('kavling.home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::all();
        return view('kavling.create',compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= Kavling::create([
            'name' => $request->name,
            'address' =>  $request->address,
            'type' => $request->type,
            'description' =>  $request->description,
            'project_id' =>  $request->project_id,
            'created_by' =>  Auth::user()->email,
        ]);
        return redirect()->route('kavling.index')
                      ->with('success','Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kavling  $kavling
     * @return \Illuminate\Http\Response
     */
    public function show(Kavling $kavling)
    {
        return view('kavling.show',compact('kavling'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kavling  $kavling
     * @return \Illuminate\Http\Response
     */
    public function edit(Kavling $kavling)
    {
        $project = Project::all();
        return view('kavling.edit',compact('kavling','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kavling  $kavling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kavling $kavling)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'type' => 'required',
            'project_id' => 'required',
        ]);
        $kavling->update($request->all());

        return redirect()->route('kavling.index')
                        ->with('success','Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kavling  $kavling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kavling $kavling)
    {
        $kavling->delete();
        return redirect()->route('kavling.index')
        ->with('success','Data deleted successfully');
    }
}
