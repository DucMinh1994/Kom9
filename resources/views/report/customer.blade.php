@extends('layouts.admin')
@section('month')
<div class="container">
	<div class="alert alert-primary" style="text-align: center;" role="alert">
		Thống kê số lượt mua hàng tại Kom 9
	</div>
	
	<table  class="table table-hover customer">
		<thead>
			<tr>
				<th>STT</th>
				<th>SĐT</th>
				<th>Địa chỉ</th>
				<th>Số lần mua hàng</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($customers as $key => $customer): ?>
				<tr>
					<td>{{$key + 1}}</td>
					<td>{{$customer->mobile}}</td>
					<td>{{$customer->address}}</td>
					<td>{{$customer->count}}</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<div >
		<a href="/export/customer" class="btn btn-success" title="">Export Excel</a>
	</div>
</div>
@endsection