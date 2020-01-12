<?php

namespace App\Http\Controllers;

use App\Order;
use App\Project;
use App\Customer;
use App\Kavling;
use App\Program;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::with('project','customer','program','kavling')->get();
        return view('order.home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::all();
       $customer = Customer::all();
        $program = Program::all();
        $kavling = Kavling::all();
        return view('order.create',compact('project','customer','program','kavling'));
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
        $data= Order::create([
            'customer_id' =>  $request->customer_id,
            'program_id' => $request->program_id,
            'kavling_id' =>  $request->kavling_id,
            'project_id' =>  $request->project_id,
            'status' =>  $request->status,
            'notes' =>  $request->notes,
            'created_by' =>  Auth::user()->email,
        ]);
        return redirect()->route('order.index')
                      ->with('success','Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $project = Project::all();
        $customer = Customer::all();
        $program = Program::all();
        $kavling = Kavling::all();
        return view('order.edit',compact('order','project','customer','program','kavling'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        /* return $request; */
        $request->validate([
            'customer_id' => 'required',
            'program_id' => 'required',
            'kavling_id' => 'required',
            'project_id' => 'required',
            'status' => 'required',
        ]);
        $order->update($request->all());
        return redirect()->route('order.index')
                        ->with('success','Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')
        ->with('success','Data deleted successfully');
    }
}
