<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderHistory;
use App\StatusOrder;
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
        $data = Order::paginate('20');
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
        $kavling = Kavling::all();
        return view('order.create',compact('project','customer','kavling'));
    }
    public function historyStore(Request $request)
    {
        $statusName = StatusOrder::find($request->status);
        $order = Order::find($request->order_id);
        $detail = OrderHistory::create([
            'order_id' =>  $request->order_id,
            'status' =>  $request->status,
            'notes' =>  $request->notes,
            'name' =>  $statusName->name,
            'icons' =>  $statusName->icons,
            'created_by' =>  Auth::user()->email,
            'updated_by' =>  Auth::user()->email,
        ]);
        $order->update(['status_id' => $request->status]);
        Kavling::where('id', $order->kavling_id)->update(['status_id' => $request->status]);

        return redirect()->route('order.show',$detail->order_id)
                      ->with('success','Order created successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data= Order::create([
            'customer_id' =>  $request->customer_id,
            'kavling_id' =>  $request->kavling_id,
            'project_id' =>  $request->project_id,
            'type_cash' =>  $request->type_cash,
            'source_fund' =>  $request->source_fund,
            'motive' =>  $request->motive,
            'purpose' =>  $request->purpose,
            'promo' =>  $request->promo,
            'notes' =>  $request->notes,
            'status_id' =>  1,
            'created_by' =>  Auth::user()->email,
            'updated_by' =>  Auth::user()->email,
        ]);

       $detail = OrderHistory::create([
            'order_id' =>  $data->id,
            'status' =>  1,
            'notes' =>  $request->notes,
            'name' =>  'Booking',
            'icons' =>  'add_shopping_cart',
            'created_by' =>  Auth::user()->email,
            'updated_by' =>  Auth::user()->email,
        ]);
        Kavling::where('id', $request->kavling_id)->update(['status_id' => 1]);
        return redirect()->route('order.index')
                      ->with('success','Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $status = StatusOrder::all();
        return view('order.show',compact('status','order'));
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
