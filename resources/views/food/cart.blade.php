@extends('layouts.master')
@section('cart')
<div class="container">
	<h2>Hóa đơn thanh toán</h2>
	<p>Đc: Thái thịnh 1</p>
	<p>Ngày: <?php echo date('Y-m-d H:i:s'); ?></p>
	<p>Số hóa đơn: {{$HD}} </p>
	<table class="table">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên món</th>
				<th>SL</th>
				<th>Đơn giá</th>
				<th>Thành tiền</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; ?>
			<?php foreach (Cart::content() as $data): ?>
				<tr class="tr{{$data->id}}">
					<td>{{$i++}}</td>
					<td>{{$data->name}}</td>
					<td class="qty{{$data->id}}">{{$data->qty}}</td>
					<td>{{number_format($data->price)}}</td>
					<td class="money-c into-money{{$data->id}}">{{number_format($data->price * $data->qty)}}</td>
				</tr>
			<?php endforeach ?>
			<tr style="border-top: 2px solid black;">
				<td colspan="2" style="font-weight: bold; color: #f66000;">Ghi chú:  </td>
				<td class="money-c">{{$note}}</td>
			</tr>
			<tr>
				<td colspan="4" style="font-weight: bold; color: #f66000;">Thành tiền: </td>
				<td class="money-c">{{Cart::subtotal()}}</td>
			</tr>
			<tr>
				<td colspan="4" style="font-weight: bold; color: #f66000;">Tiền giảm giá: </td>
				<td class="money-c">{{$request->sale}}</td>
			</tr>
			<tr>
				<td colspan="4" style="font-weight: bold; color: #f66000;">Tiền ship: </td>
				<td class="money-c">{{number_format($request->money_ship)}}</td>
			</tr>
			<tr>
				<td colspan="4" style="font-weight: bold; color: #f66000;">Tổng cộng: </td>
				<td class="money-c">{{number_format($submoney)}}</td>
			</tr>
		</tbody>
	</table>
	<button type="" class="print btn btn-primary">In hóa đơn</button>
	@endsection
