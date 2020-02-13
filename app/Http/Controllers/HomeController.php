<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use DB;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Customer = Customer::select(DB::raw("MONTH(created_at) as x,count('id') as y"))->whereYear('created_at', '=', Carbon::now()->year)->orderBy('x')->groupBy(DB::raw('MONTH(created_at)'))->get();
        $Order =       Order::select(DB::raw("MONTH(created_at) as x,count('id') as y"))->whereYear('created_at', '=', Carbon::now()->year)->orderBy('x')->groupBy(DB::raw('MONTH(created_at)'))->get();
        $dataOrder = array(['x'=>1,'y'=>0],['x'=>2,'y'=>0],['x'=>3,'y'=>0],['x'=>4,'y'=>0],['x'=>5,'y'=>0],['x'=>6,'y'=>0],['x'=>7,'y'=>0],['x'=>8,'y'=>0],['x'=>9,'y'=>0],['x'=>10,'y'=>0],['x'=>11,'y'=>0],['x'=>12,'y'=>0]);
        $dataCustomer = array(['x'=>1,'y'=>0],['x'=>2,'y'=>0],['x'=>3,'y'=>0],['x'=>4,'y'=>0],['x'=>5,'y'=>0],['x'=>6,'y'=>0],['x'=>7,'y'=>0],['x'=>8,'y'=>0],['x'=>9,'y'=>0],['x'=>10,'y'=>0],['x'=>11,'y'=>0],['x'=>12,'y'=>0]);
        foreach ($Order as $key) {
            $dataOrder[$key->x-1] = $key;
        }
        foreach ($Customer as $key) {
            $dataCustomer[$key->x-1] = $key;
        }
        $top10Kecamatan = Customer::with('distrik')->select('distric',DB::raw('count(distric) as total'))->orderBy('total','DESC')->groupBy('distric')->limit(10)->get();
        $customer = Customer::with('program')->select('program_id',DB::raw('count(program_id) as total'))->groupBy('program_id')->get();
        $order = Order::with('status')->select('status_id', DB::raw('count(status_id) as total'))->groupBy('status_id')->get();

        return view('dashboard',compact('order','customer','dataOrder','dataCustomer'));
    }
}
