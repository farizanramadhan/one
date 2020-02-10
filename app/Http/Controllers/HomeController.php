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
        $dataGraph = Customer::select(DB::raw("MONTH(created_at) as x,count('id') as y"))->whereYear('created_at', '=', Carbon::now()->year)->orderBy('x')->groupBy(DB::raw('MONTH(created_at)'))->get();
        $dataOrder = Order::select(DB::raw("count('id') as y,MONTH(created_at) as x"))->orderBy('x')->groupBy(DB::raw('MONTH(created_at)'))->get();
        $graphJml            = $dataGraph->pluck('jml');
        $graphLbl           = $dataGraph->pluck('bulan');
       /*  $comexOutstanding       = M_eis::select('tgl_data as x',DB::raw('SUM(comex_outstandingkredit) as y'))->where("tgl_data",">", Carbon::now()->subMonths(5))->groupBy('tgl_data')->orderBy('tgl_data')->get(); */

        $customer = Customer::with('program')->select('program_id',DB::raw('count(program_id) as total'))->groupBy('program_id')->get();
        $order = Order::with('status')->select('status_id', DB::raw('count(status_id) as total'))->groupBy('status_id')->get(); //Booking
   /*      $order = Order::where('status_id',1)->count(); //Booking
        $order = Order::where('status_id',2)->count(); //BIchecking
        $order = Order::where('status_id',8)->count(); //CollectBerkas
        $order = Order::where('status_id',13)->count(); //Akad */
        return view('dashboard',compact('order','customer','dataOrder','dataGraph'));
    }
}
