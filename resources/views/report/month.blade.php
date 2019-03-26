@extends('layouts.admin')
@section('month')
<div class="container">
	<div class="row">
		<label for="">Mời bạn nhập vào tháng</label>
		<input type="number" name="" value="" placeholder="Nhập tháng vào đây">
	</div>
	<table id="month-table">
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
			</tr>
		</thead>
	</table>
</div>
@endsection