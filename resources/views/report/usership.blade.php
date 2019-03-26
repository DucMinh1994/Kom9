@extends('layouts.admin')
@section('month')
<div class="container">
	<div class="row">
		<div class="col-7">
			<div class="row">
				<div style="margin: 0 auto; margin-bottom: 10px;">
					<form action="/reports/users/search" method="get" accept-charset="utf-8">
						<label for="" style="font-weight: bold;">Nhập vào tên</label>
						<input type="search" name="keyword" class="search" value="" placeholder="Hãy nhập tên người cần tìm">
						<button type="" class="btn btn-primary">search</button>
					</form>	
				</div>
			</div>
			<div class="row">
				<table class="table table-hover report">
					<thead>
						<tr>
							<th>STT</th>
							<th>name</th>
							<th>address</th>
							<th>total</th>
							<th>ship</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($order as $value): ?>
							<tr>
								<td>{{$value->id}}</td>
								<td>{{$value->name}}</td>
								<td>{{$value->address}}</td>
								<td>{{$value->total}}</td>
								<td>{{$value->money_ship}}</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-5">
			<div> Tiền: {{number_format($total_ship)}}</div>
			<div>
				Số đơn: {{count($order)}}
			</div>
			<div>
				 <div class="panel-body">
                    {!! $chart->html() !!}
                </div>
			</div>
				{!! Charts::scripts() !!}
				{!! $chart->script() !!}
		</div>
	</div>
</div>
<script>
	
</script>
@endsection