@extends('layouts.admin')
@section('month')
<div class="container">
		<div class="row">
			<div style="margin: 0 auto; margin-bottom: 10px;">
				<form action="giaodien_submit" method="get" accept-charset="utf-8">
					<label for="" style="font-weight: bold;">Nhập vào tên</label>
					<input type="search" name="" value="" placeholder="Hãy nhập tên người cần tìm">
					<button type="" class="btn btn-primary">search</button>
				</form>	
			</div>
		</div>
		<div class="row">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>STT</th>
						<th>address</th>
                        <th>price</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($variable as $key => $value): ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
@endsection