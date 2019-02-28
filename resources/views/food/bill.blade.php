@extends('layouts.master')

@section('show')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="frm-mo" style="width: 90%;margin: 0 auto;">
					<h2>Hóa đơn thanh toán</h2>
					<p>Đc: Thái thịnh 1</p>
					<p>Ngày: <?php echo date('Y-m-d H:i:s'); ?></p>
					<p>Số hóa đơn: </p>
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
						<tbody id="in">
							
						</tbody>
						<tr style="border-top: 2px solid black;">
								<td colspan="4" style="font-weight: bold; color: #f66000;">Thành tiền: </td>
								<td class="money-c"></td>
							</tr>
							<tr>
								<td colspan="4" style="font-weight: bold; color: #f66000;">Tiền giảm giá: </td>
								<td class="money-c"></td>
							</tr>
							<tr>
								<td colspan="4" style="font-weight: bold; color: #f66000;">Tiền ship: </td>
								<td class="money-c"></td>
							</tr>
							<tr>
								<td colspan="4" style="font-weight: bold; color: #f66000;">Tổng cộng: </td>
								<td class="money-c"></td>
							</tr>
					</table>
					<button type="" class="print">In hóa đơn</button>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
	@section('bill')
	<div class="container non">

		<h1 class="text-center">HDTuto - Laravel DataTables Tutorial Example</h1>
		<table class="table table-hover" id="users-table">
			<thead>
				<tr>
					<th>Id</th>
					<th>Max HĐ</th>
					<th>Tên</th>
					<th>SĐT</th>
					<th>Địa chỉ</th>
					<th>Sale</th>
					<th>tiền ship</th>
					<th>Tổng tiền</th>
					<th>Action</th>
				</tr>
			</thead>
		</table>
	</div>
	@endsection
