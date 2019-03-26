<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Order;
use App\OrderDetail;

class BillController extends Controller
{
	public function index(){
		return view('food.bill');
	}
	public function getData(){
		return Datatables::of(Order::query()->orderBy('created_at', 'desc'))->addColumn('action', function ($order) {
			return '
			<a data-id="'.$order->id.'"data-toggle="modal" data-target=".bd-example-modal-lg" href="#modal-show" class="btn btn-show"><i class="fas fa-eye fa-eye"></i></a>
			<a data-toggle="modal" href="#modal-edit" data-id="'.$order->id.'" class="btn btn-edit"><i class="fas fa-edit fa-edit"></i></a>
			<a href="#" data-id="'.$order->id.'" class="btn btn-delete"><i class="far fa-trash-alt fa-delete"></i></a>';
		})
		->rawColumns(['action'])
		->make(true);
	}
	public function show($id){
		$order = Order::find($id);
		$orderdetail = $order->orderdetail;
		foreach ($orderdetail as $row) {
			$arr[] = $row->products;
		}
		return response()->json(['order'=>$order, 'orderdetail' => $orderdetail,'arr'=>$arr]);
	}
	public function edit(Request $request, $id){
		$data = $request->name;
		Order::where('id',$id)->update([
			'name' => $request->name,
			'address' => $request->address,
			'mobile' => $request->mobile,
			'money_ship' => $request->money_ship,
			'status' => $request->sale,
			'note' => $request->note
		]);
		return response()->json(['request' => $data]);
	}
	public function destroy($id){
		Order::find($id)->delete();
		OrderDetail::where('order_id','=',$id)->delete();
		return response()->json(['message' => 'Xóa thành công!']);
	}
}
