<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Program;
use Illuminate\Http\Request;
use Auth;
use Indonesia;
use DB;
use Carbon\Carbon;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $customers = Customer::all();

      return view('customer.home',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Indonesia::allProvinces();
        $programs = Program::all();
        return view('customer.create',compact('provinsi','programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = collect([['project_id' => null,
        'result' => 'Start',
        'status' => 'Start',
        'created_at' => Carbon::now(),
        'created_by' =>  Auth::user()->email,
        ]]);
        $customer= Customer::create([
            'no_ktp' => $request->no_ktp,
            'no_npwp' => $request->no_npwp,
            'full_name' => $request->full_name,
            'address' =>  $request->address,
            'province' =>  $request->province,
            'city' =>  $request->city,
            'distric' =>  $request->distric,
            'phone' => $request->phone,
            'email' =>  $request->email,
            'income' =>  $request->income,
            'status' =>  $status,
            'program_id' =>  $request->program_id,
            'description' =>  $request->description,
            'created_by' =>  Auth::user()->email,
        ]);


        return redirect()->route('customer.index')
                      ->with('success','Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

        return view('customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
      /*   $status = collect(['project_id' => 1,
        'result' => 'Berminat',
        'status' => 'Call In',
        'created_at' => Carbon::now(),
        'created_by' =>  Auth::user()->email,
        ]);
        $temp = collect($customer->status);
        $temp->push($status);
        $customer->status = $temp;
        $customer->save();
 */
      /*   return $customer; */
        $provinsi = Indonesia::allProvinces();
        return view('customer.edit',compact('customer','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
      $request->validate([
          'full_name' => 'required',
          'address' => 'required',
          'phone' => 'required',
          'email' => 'required',
          'description' => 'required',
      ]);
      $customer->update($request->all());

      return redirect()->route('customer.index')
                      ->with('success','Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
      $customer->delete();

      return redirect()->route('customer.index')
                      ->with('success','Customer deleted successfully');
    }

    public function updateFU(Request $request)
    {
        $status = collect([['project_id' => $request->project_id,
        'result' => $request->result,
        'status' => $request->status,
        'created_at' => Carbon::now(),
        'created_by' =>  Auth::user()->email,
        ]]);
        $customer = Customer::find($request->customer_id);
        $customer->status->push($status);
        $customer->save();
        return $customer;
    /*   return redirect()->route('customer.index')
                      ->with('success','Customer updated successfully.'); */
    }

    public function getKtp(Request $request)
    {
        $queri = $request->input('query');
        $hasil =  Customer::select("no_ktp")
                ->where("no_ktp","LIKE","{$request->input('query')}%")
                ->get();
                $data = array();
                foreach ($hasil as $hsl)
                    {
                        $data[] = $hsl->no_ktp;
                    }
               /*  $data = DB::select('select no_ktp from customers where no_ktp LIKE "'.$queri.'%"'); */
        return response()->json($data);
    }
    public function getCity(Request $request)
    {
        if ($request->has('q')) {
            if ($request->q) {
            $cari = $request->q;
            $hasil = Indonesia::findProvince($cari, $with = 'cities');
            $data = $hasil->cities;
            return response()->json($data,200);
            }
            return response()->json(null,200);
        }
        return response()->json(null,200);

    }
    public function getDistric(Request $request)
    {
        if ($request->has('q')) {
            if ($request->q) {
                $cari = $request->q;
                $hasil = Indonesia::findCity($cari, $with = 'districts');
                $data = $hasil->districts;
                return response()->json($data,200);
            }
        return response()->json(null,200);

        }
        return response()->json(null,200);
    }
}
