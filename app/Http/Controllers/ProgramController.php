<?php

namespace App\Http\Controllers;
use Auth;
use App\Program;
use App\Project;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Program::all();
        return view('program.home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::all();
        return view('program.create',compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $budget = str_replace('.', '', $request->budget);
        $data= Program::create([
            'name' => $request->name,
            'budget' =>  $budget,
            'project_id' =>  $project_id,
            'created_by' =>  Auth::user()->email,
        ]);
        return redirect()->route('program.index')
                      ->with('success','Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        return view('program.show',compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $project = Project::all();

        return view('program.edit',compact('program','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $budget = str_replace('.', '', $request->budget);
        $request->validate([
            'name' => 'required',
            'project_id' => 'required',
            'budget' => 'required',
        ]);
        $program->update(['name' => $request->name, 'budget' => $budget]);

        return redirect()->route('program.index')
                        ->with('success','Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->route('program.index')
                        ->with('success','Data deleted successfully');
    }
}
