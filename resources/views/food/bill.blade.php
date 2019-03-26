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
								<td class="money-tt"></td>
							</tr>
							<tr>
								<td colspan="4" style="font-weight: bold; color: #f66000;">Tiền giảm giá: </td>
								<td class="money-sale"></td>
							</tr>
							<tr>
								<td colspan="4" style="font-weight: bold; color: #f66000;">Tiền ship: </td>
								<td class="money-ship"></td>
							</tr>
							<tr>
								<td colspan="4" style="font-weight: bold; color: #f66000;">Tổng cộng: </td>
								<td class="money-total"></td>
							</tr>
					</table>
					<div class="modal-footer">
						<button type="" class="print btn btn-primary">In hóa đơn</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('edit')
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="frm-mo" style="width: 90%;margin: 0 auto;">
				<div class="left" style="float: left; width: 50%;">
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
						<tbody id="now">
							
						</tbody>
						<tr style="border-top: 2px solid black;">
								<td colspan="4" style="font-weight: bold; color: #f66000;">Thành tiền: </td>
								<td class="money-tt"></td>
							</tr>
							<tr>
								<td colspan="4" style="font-weight: bold; color: #f66000;">Tiền giảm giá: </td>
								<td class="money-sale"></td>
							</tr>
							<tr>
								<td colspan="4" style="font-weight: bold; color: #f66000;">Tiền ship: </td>
								<td class="money-ship"></td>
							</tr>
							<tr>
								<td colspan="4" style="font-weight: bold; color: #f66000;">Tổng cộng: </td>
								<td class="money-total"></td>
							</tr>
					</table>
				</div>
				<div class="right" style="width: 50%; float: left;">
					<div class="frm-show">
                            <form action="" method="PUT" accept-charset="utf-8" id="frm-cc">
                             {{ csrf_field() }}
                             <div class="form-group">
                              <label for="name">Tên người ship</label>
                              <input type="text" class="form-control name" name="name" placeholder="tên người ship">
                            </div>
                            <div class="form-group">
                              <label for="address">Địa chỉ</label>
                              <input type="text" class="form-control address" name="address" placeholder="123 Nguyễn Văn cừ">
                              <div>
                                {{$errors->first('address')}}
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="mobile">Số điện thoại</label>
                              <input type="text" class="form-control mobile" name="mobile" placeholder="08455633256">
                              <div>
                                {{$errors->first('mobile')}}
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="sale">Sale</label>
                              <input type="text" class="form-control sale" name="sale" placeholder="10% or 20000 VNĐ">
                              <div>
                                {{$errors->first('sale')}}
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="money_ship">Tiền ship</label>
                              <input type="number" class="form-control money_ship" name="money_ship" placeholder="56000">
                              <div>
                                {{$errors->first('money_ship')}}
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="note">Ghi chú</label>
                              <textarea class="form-control note" rows="3" name="note" placeholder="ghi chú các món ăn ở đây (vd: thêm chanh, muối, cơm...)"></textarea>
                            </div>
                          </form>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="" class="save btn btn-primary" data-id="">Sửa thông tin</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
	@section('bill')
	<div class="container non">

		<h1 class="text-center">Thông tin hóa đơn</h1>
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
