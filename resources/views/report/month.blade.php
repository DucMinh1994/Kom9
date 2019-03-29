@extends('layouts.admin')
@section('month')
<div class="container">
	<div class="row">
		<form action="/reports/statistical" method="get" accept-charset="utf-8">
			<label for="">Mời bạn nhập vào tháng</label>
			<input type="search" name="keyword" class="search" value="" placeholder="Hãy nhập tên người cần tìm">
			<button type="" class="btn btn-primary">search</button>
		</form>
		<div style="margin-left: 50px;">
			<a href="/export" class="btn btn-success" title="">Export Excel</a>
		</div>
	</div>
	<div class="alert alert-primary" role="alert">
		<div>
			Tổng tiền : {{number_format($total)}} đ
		</div>
		<div>
			Tổng tiền ship : {{number_format($ship)}} đ
		</div>
		<div>
			Số hóa đơn: {{count($order)}}
		</div>
	</div>
	<table  class="table table-hover">
		<thead>
			<tr>
				<th>STT</th>
				<th>Mã HĐ</th>
				<th>Tên</th>
				<th>SĐT</th>
				<th>Địa chỉ</th>
				<th>Sale</th>
				<th>Tiền ship</th>
				<th>Tổng tiền</th>
				<th>Ghi chứ</th>
				<th>Created_at</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($order as $value): ?>
				<tr>
					<td>{{$value->id}}</td>
					<td>{{$value->code}}</td>
					<td>{{$value->name}}</td>
					<td>{{$value->mobile}}</td>
					<td>{{$value->address}}</td>
					<td>{{$value->status}}</td>
					<td>{{$value->money_ship}}</td>
					<td>{{$value->total}}</td>
					<td>{{$value->note}}</td>
					<td>{{$value->created_at}}</td>
				</tr>
				<tr>
					<th colspan="" rowspan="" headers="" scope=""></th>
					<th colspan="4" rowspan="" headers="" scope="">Tên</th>
					<th colspan="5" rowspan="" headers="" scope="">SL</th>
				</tr>
				<?php foreach ($value->orderdetail as $detail): ?>
					<tr>
						<td colspan="1" rowspan="" headers=""></td>
						<td colspan="4" rowspan="" headers="">{{$detail->products->name}}</td>
						<td colspan="5" rowspan="" headers="">{{$detail->soluong}}</td>
					</tr>
				<?php endforeach ?>
				
				
			<?php endforeach ?>
		</tbody>
	</table>
</div>
@endsection