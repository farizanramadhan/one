<?php

namespace App\Http\Controllers;

use App\Project;
use App\Kavling;
use Illuminate\Http\Request;
use Auth;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::with('kavling')->get();

        return view('project.home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= Project::create([
            'name' => $request->name,
            'address' =>  $request->address,
            'description' =>  $request->description,
            'created_by' =>  Auth::user()->email,
        ]);
        return redirect()->route('project.index')
                      ->with('success','Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('project.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            
            'description' => 'required',
        ]);
        $project->update($request->all());

        return redirect()->route('project.index')
                        ->with('success','Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')
                        ->with('success','Data deleted successfully');
    }
    public function countKavling(){

    }
    public function getKavling(Request $request)
    {
        if ($request->has('q')) {
            if ($request->q) {
            $cari = $request->q;
            $hasil = Kavling::where('project_id',$cari)->whereIn('status_id',array(4,5,6,7,14,10,11))->get();
            $data = $hasil;
            if($data->count())return response()->json($data,200);
            else{
                $data = collect([['id' => 0,
                'name' => 'Tidak Ada Kavling Tersedia',
                ]]);
                return response()->json($data,200);
            }
            }
            return response()->json(null,200);
        }
        return response()->json(null,200);

    }
}
