<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Order;
use Charts;
use DB;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\OrderExport;
use App\Exports\CustomersExport;
use App\Customers;

class ReportController extends Controller
{
    public function index()
    {
    	$order = Order::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
    				->get();
    	$mouth = Order::where(DB::raw("(DATE_FORMAT(created_at,'%m'))"),date('m'))
    				->get();
    	$d1=$d2=$d3=$d4=$d5=$d6=$d7=$d8=$d9=$d10=$d11=$d12=$d13=$d14=$d15=$d16=$d17=$d18=$d19=$d20=$d21=$d22=$d23=$d24=$d25=$d26=$d27=$d28=$d29=$d30=$d31 = 0;
    	foreach ($mouth as $value) {
    		switch (DATE_FORMAT($value->created_at,'d')) {
    			case '01':
    				$d1++;
    				break;
    			case '02':
    				$d2++;
    				break;
    			case '03':
    				$d3++;
    				break;
    			case '04':
    				$d4++;
    				break;
    			case '05':
    				$d5++;
    				break;
    			case '06':
    				$d6++;
    				break;
    			case '07':
    				$d7++;
    				break;
    			case '08':
    				$d8++;
    				break;
    			case '09':
    				$d9++;
    				break;
    			case '10':
    				$d10++;
    				break;
    			case '11':
    				$d11++;
    				break;
    			case '12':
    				$d12++;
    				break;
    			case '13':
    				$d13++;
    				break;
    			case '14':
    				$d14++;
    				break;
    			case '15':
    				$d15++;
    				break;
    			case '16':
    				$d16++;
    				break;
    			case '17':
    				$d17++;
    				break;
    			case '18':
    				$d18++;
    				break;
    			case '19':
    				$d19++;
    				break;
    			case '20':
    				$d20++;
    				break;
    			case '21':
    				$d21++;
    				break;
    			case '22':
    				$d22++;
    				break;
    			case '23':
    				$d23++;
    				break;
    			case '24':
    				$d24++;
    				break;
    			case '25':
    				$d25++;
    				break;
    			case '26':
    				$d26++;
    				break;
    			case '27':
    				$d27++;
    				break;
    			case '28':
    				$d28++;
    				break;
    			case '29':
    				$d29++;
    				break;
    			case '30':
    				$d30++;
    				break;
    			case '31':
    				$d31++;
    				break;
    			default:
    				break;
    		}
    		
    	}
       	$count = count($order);
		$total =0;
		$total_ship= 0;
		foreach ($order as $value) {
			$money = str_replace(',','',$value->total);
			$total_ship += $value->money_ship;
			$total += $money;
		}
        $chart = Charts::database($order, 'bar', 'highcharts')
			      ->title("Biểu đồ số đơn hàng trong năm ".date('Y'))
			      ->elementLabel("Số đơn hàng")
			      ->dimensions(1000, 500)
			      ->responsive(false)
			      ->groupByMonth(date('Y'), true);
		$char = Charts::multi('areaspline', 'highcharts')
			    ->title('Báo cáo số đơn trong tháng '.date('m'))
			    ->colors(['#ff0000', '#ffffff'])
			    ->labels(['1', '2', '3', '4', '5','6', '7','8', '9', '10', '11', '12','13', '14','15', '16', '17', '18', '19','20', '21','22', '23', '24', '25', '26','27', '28', '29' ,'30', '31'])
			    ->dataset('Số đơn', [$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15,$d16,$d17,$d18,$d19,$d20,$d21,$d22,$d23,$d24,$d25,$d26,$d27,$d28,$d29,$d30,$d31]);
        return view('report.index',compact('chart','total','count','total_ship','char'));
    	// return view('report.index');
    }
    public function month(){
        $order = Order::where(DB::raw("(DATE_FORMAT(created_at,'%m'))"),date('m'))
                    ->get();
        $total = 0;
        $ship = 0;
        foreach ($order as $value) {
            $total += $value->total;
            $ship += $value->money_ship;
        }
    	return view('report.month',compact('order','total','ship'));
    }
    public function getData(request $request){
        $order = Order::whereMonth('created_at', $request->keyword)->get();
        $total = 0;
        $ship = 0;
        foreach ($order as $value) {
            $total += $value->total;
            $ship += $value->money_ship;
        }
    	return view('report.month',compact('order','total','ship'));
    }
    public function ship(){
    	$order = Order::where(DB::raw("(DATE_FORMAT(created_at,'%d'))"),date('d'))
    				->get();
        $totalDay = 0;
        $total_ship = 0;
        foreach ($order as $value) {
            $totalDay += $value->total;
            $total_ship += $value->money_ship;
        }
        $count = count($order);
        $chart = Charts::database($order, 'bar', 'highcharts')
                    ->title('My nice chart')
                    ->labels(['tiền', 'Số hóa đơn', 'tiền ship'])
                    ->values([4,$count,4])
                    ->responsive(false);
    	return view('report.usership',compact('chart','order','totalDay','total_ship'));
    }
    public function search(request $request){
        // dd($request->keyword);
        $order = Order::where([[DB::raw("(DATE_FORMAT(created_at,'%d'))"),date('d')],['name','like',$request->keyword]])->get();
        $totalDay = 0;
        $total_ship = 0;
        foreach ($order as $value) {
            $totalDay += $value->total;
            $total_ship += $value->money_ship;
        }
        return view('report.usership',compact('order','totalDay','total_ship'));
    }

    public function excel(){
        $orders = Order::where(DB::raw("(DATE_FORMAT(created_at,'%m'))"),date('m'))->get();
        return Excel::download(new OrderExport, 'order.xlsx');
    }
    public function excelCustomer(){
        return Excel::download(new CustomersExport, 'KhachHang.xlsx');
    }
    public function getCustomer(){
        $customers = Customers::get();
        return view('report.customer',compact('customers'));
    }
}
