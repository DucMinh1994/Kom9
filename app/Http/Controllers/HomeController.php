<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use App\OrderDetail;
use App\Customers;
use App\Http\Requests\PhoneRequest;
use App\Rules\PhoneNumber;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Product::get();
        return view('food.index',['products' => $products]);
    }
    public function cart(Request $request){
        $code = 'HD'.time();
        $customers = Customers::get();
        $count = 0;
        foreach ($customers as $customer) {
            if($customer->mobile == $request->mobile){
                $count = $customer->count + 1;
                Customers::where('id', $customer->id)->update(['count' => $count]);
            // }else{
            //     Customers::create(['mobile' => $request->mobile, 'address' => $request->address, 'count' => 1]);
            // }
        }
            if(!strpos($request->sale, '%')){
                $money = str_replace(',','',Cart::subtotal());
                $subtotal = ($money + $request->money_ship)-$request->sale;
                $order = Order::create(['code' => $code, 'name' => $request->name, 'email' => '', 'mobile' => $request->mobile, 'address' => $request->address, 'status' => $request->sale, 'user_id' => 1, 'money_ship' => $request->money_ship, 'total' => $subtotal, 'note' => $request->note]);
                foreach (Cart::content() as $cart) {
                    OrderDetail::Create(['order_id' => $order->id, 'product_id' => $cart->id, 'soluong' => $cart->qty]);
                }

                return view('food.cart',['request' => $request,'HD' => $code, 'submoney'=>$subtotal,'sale' => $request->sale,'note' => $request->note]);
            }else{
                $money = str_replace(',','',Cart::subtotal());
                $sale_input = str_replace('%','',$request->sale);
                $sale = $sale_input/100;
                $subtotal = ($money + $request->money_ship)-(($money + $request->money_ship)*$sale);
                $order = Order::create(['code' => $code, 'name' => $request->name, 'email' => '', 'mobile' => $request->mobile, 'address' => $request->address, 'status' => $request->sale, 'user_id' => 1, 'money_ship' => $request->money_ship, 'total' => $subtotal, 'note' => $request->note]);
                foreach (Cart::content() as $cart) {
                    OrderDetail::Create(['order_id' => $order->id, 'product_id' => $cart->id, 'soluong' => $cart->qty]);
                }
                return view('food.cart',['request' => $request,'HD' => $code, 'submoney'=>$subtotal,'sale' => $request->sale,'note' => $request->note]);
            }
        }
    public function menu($id){

        $products = Product::where('category_id','=',$id)->get();
        foreach ($products as $product) {
            $product->price = number_format($product->price);
        }
        return response()->json([
            'products' => $products
        ]);
            // return view('food.index',['products' => $products]);

    }
    public function pay($id, Request $request){
        $product = Product::find($id);
        switch ($request->selectId) {
            case '1':
                $cart = Cart::add($product->id,$product->name,1,$product->price, ['size' => $request->select, 'idZise' => $request->selectId]);
                break;
            case '2':
                $product->price +=  5000;
                $cart = Cart::add($product->id,$product->name,1,$product->price, ['size' => $request->select, 'idZise' => $request->selectId]);
                break;
            case '3':
                $product->price +=  15000;
                $cart = Cart::add($product->id,$product->name,1,$product->price, ['size' => $request->select, 'idZise' => $request->selectId]);
                break;
            case '4':
                $cart = Cart::add($product->id,$product->name,1,$product->price, ['size' => $request->select, 'idZise' => $request->selectId]);
                break;
            default:
                # code...
                break;
        }
        
        $subtotal = Cart::subtotal();
            // Cart::destroy();
        $count = count(Cart::content());
        return response()->json([
            'count' => $count,
            'pay' => 'mua thanh cong',
            'cart' => $cart,
            'rowId'  => $request->size,
            'subtotal' => $subtotal,
            'size' => $request->selectId
        ]);
    }
    public function mua($id, Request $request){
        foreach (Cart::Content() as $value) {
            if($value->rowId == $request->size){
                $qty = $value->qty+1;
                    Cart::update($value->rowId, $qty);
            }
        }
        $subtotal = Cart::subtotal();
            // Cart::destroy();
        $count = count(Cart::content());
        return response()->json([
            'count' => $count,
            'pay' => 'mua thanh cong',
            'qty' => $qty,
            'rowId'  => $request->size,
            'subtotal' => $subtotal
        ]);
    }
    public function minus($id, Request $request){
        foreach (Cart::Content() as $data) {
            if($data->rowId == $request->rowId){
                if($data->qty == 1){
                    Cart::remove($data->rowId);
                    $count = count(Cart::content());
                    $subtotal = Cart::subtotal();
                    return response()->json([
                        'count' => $count,
                        'subtotal' => $subtotal,
                        'delete'  => 'true',
                        'rowId'  => $request->rowId
                    ]);
                }else{
                    $qty = $data->qty-1;
                    Cart::update($data->rowId, $qty);
                    $count = count(Cart::content());
                    $subtotal = Cart::subtotal();
                    $price = $data->price;
                    return response()->json([
                        'price' =>$price,
                        'count' => $count,
                        'qty' => $qty,
                        'subtotal' => $subtotal,
                        'rowId'  => $request->rowId
                    ]);
                }
            }
        }

    }
    public function getData(){  
            // return Datatables::of(Order::query())->make(true);
             // return Datatables::of(Order::query()->orderBy('created_at', 'desc'))->addColumn('action', function ($order) {
             //        return '
             //        <a data-id="'.$order->id.'" data-toggle="modal" href="#modal-show" class="btn btn-xs btn-info">Show</a>
             //        <a data-toggle="modal" href="#modal-edit" data-id="'.$order->id.'" class="btn btn-xs btn-primary">Edit</a>
             //        <a href="#" data-id="'.$order->id.'" class="btn btn-xs btn-danger">Delete</a>';
             //    })
             //    ->rawColumns(['action'])
             //    ->make(true);
    }
    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $select = '';
            $query = $request->get('query');
            $data = Product::where('name', 'like', '%'.$query.'%')
                 ->get();
             
      
            $total_row = $data->count();
            if($total_row > 0)
            {   

                foreach($data as $row)
                {
                    $output .= '
                    <div class="col-lg-2 product wow slideInDown">
                    <img src="'.asset('food/themes/assets/images/salate.png') .'" alt="'.$row->name.'">
                    <h4 class="name">'.$row->name.'</h4>
                    <h4 class="price">'.number_format($row->price).' <span>đ</span></h4>

                    ';
                    if(!empty($row->attributes)){

                        $output.= '<select class="selectList'.$row->id.'">';
                        foreach ($row->attributes as $key => $value) {

                            if($key < 3){

                                $output = $output . '<option value="'.$value->id.'">'.$value->name.'</option>';


                            }
                        } 
                        $output.='</select>';
                    }
                    


                    $output .='<p><a class="btn btn-default btn-add" rowId="'.$row->id.'" href="" role="button">Add to cart &raquo;</a></p>
                    </div>';
                }
                
            }
        else
        {
           $output = '
           <tr>
            <td align="center" colspan="5">Không tìm thấy đồ ăn phù hợp</td>
           </tr>
           ';
        }
        $data = array(
           'table_data'  => $output,
           'total_data'  => $total_row
        );

        echo json_encode($data);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('23232');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        foreach (Cart::content() as $data) {
            if($data->rowId == $id){
                Cart::remove($data->rowId);
                $count = count(Cart::content());
                $subtotal = Cart::subtotal();
                return response()->json([
                    'count' => $count,
                    'subtotal' => $subtotal,
                    'message'  => 'Xóa thành công'
                ]);
            }
        }
    }
}
