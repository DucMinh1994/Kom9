@extends('layouts.admin')
@section('home')
  <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/reports">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">Báo Cáo</li>
          </ol>
	<!-- <i class="fas fa-dollar-sign"></i> -->
          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                  </div>
                  <div class="mr-5">{{number_format($total)}} đ</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/reports/month">
                  <span class="float-left">Xem chi tiết</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">11 New Tasks!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">{{$count}}</div>
                </div>
                <!-- <i class="fas fa-motorcycle"></i> -->
                <a class="card-footer text-white clearfix small z-1" href="/reports/month">
                  <span class="float-left">Xem chi tiết</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-motorcycle"></i>
                  </div>
                  <div class="mr-5">{{number_format($total_ship)}} đ</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/reports/users">
                  <span class="float-left">Xem chi tiết</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
		<div class="container">
		    <div class="row">
		        <div class="col-md-12">
		            <div class="panel panel-default">
		                <div class="panel-body">
		                    {!! $chart->html() !!}
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
			{!! Charts::scripts() !!}
			{!! $chart->script() !!}
		<div class="container">
		    <div class="row">
		        <div class="col-md-12">
		            <div class="panel panel-default">
		                <div class="panel-body">
		                    {!! $char->html() !!}
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
			{!! Charts::scripts() !!}
			{!! $char->script() !!}
          <!-- Area Chart Example-->
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
       
@endsection
