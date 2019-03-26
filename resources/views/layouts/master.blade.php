<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="themes/assets/ico/favicon.ico">
  <title>Kom9</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="{{asset('food/themes/dist/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy this line! -->
  <!--[if lt IE 9]><script src="themes/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
          <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
          <![endif]-->

          <!-- Custom styles for this template -->
          <!-- <link rel="stylesheet" href="https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css"> -->
          <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
          <link href="{{asset('food/themes/assets/css/carousel.css')}}" rel="stylesheet">
          <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
          <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"> -->
          <link href="{{asset('css/styte.css')}}" rel="stylesheet">
          <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
          <style type="text/css" media="screen">


        </style>
      </head>
      <!-- NAVBAR
        ================================================== -->
        <body>
          <div class="navbar-wrapper">
            <div class="container">

              <div class="navbar navbar-inverse navbar-static-top" role="navigation">
                <div class="container">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  </div>
                  <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="/">Kom9</a></li>
                      <li><a href="/reports">Báo cáo</a></li>
                      <li><a href="/order">Hóa đơn</a></li>
                      <li class="dropdown">
                         <div class="form-group">
                          <input type="text" name="search" id="search" class="form-control" placeholder="Tìm kiếm nhanh" />
                         </div>
                      </li>
                      <li><a class="fas-cart" href="" title=""><i class="fas fa-cart-plus"></i></a>
                        <div class="cart">
                          <h3>Hóa Đơn</h3>
                          <div class="number_cart">

                            <?php foreach (Cart::content() as $data): ?>
                              <div class="information {{$data->rowId}}">
                                <div>{{$data->name}} + {{ $data->options->size }}</div>
                                <div class="quantity">
                                  <button  class="btn-minus" rowId="{{$data->id}}" rowdd="{{$data->rowId}}" title=""><i class="fas fa-minus"></i></button> 
                                  <div class="qty{{$data->rowId}}">{{$data->qty}}</div> 
                                  <button  class="btn-plus" rowId="{{$data->id}}" rowdd="{{$data->rowId}}" title=""><i class="fas fa-plus"></i></button>
                                </div>
                                <div class="money-sp">{{$data->price}}</div><span class="acs">đ</span> <a class="delete" rowId="{{$data->rowId}}" ><i class="fas fa-trash-alt"></i></a>
                              </div>
                            <?php endforeach ?>
                          </div>

                          <div class="money">
                            <span>Tổng tiền:</span>
                            <span class="subtotal">{{Cart::subtotal()}}</span><span class="acs">đ</span>
                          </div>
                          <div class="frm-show">
                            <form action="/cart" method="POST" accept-charset="utf-8" id="frm-cc">
                             {{ csrf_field() }}
                             <div class="form-group">
                              <label for="name">Tên người ship</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="tên người ship">
                            </div>
                            <div class="form-group">
                              <label for="address">Địa chỉ</label>
                              <input type="text" class="form-control" id="address" name="address" placeholder="123 Nguyễn Văn cừ">
                              <div>
                                {{$errors->first('address')}}
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="mobile">Số điện thoại</label>
                              <input type="text" class="form-control" id="mobile" name="mobile" placeholder="08455633256">
                              <div>
                                {{$errors->first('mobile')}}
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="sale">Sale</label>
                              <input type="text" class="form-control" id="sale" name="sale" placeholder="10% or 20000 VNĐ">
                              <div>
                                {{$errors->first('sale')}}
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="money_ship">Tiền ship</label>
                              <input type="number" class="form-control" id="money_ship" name="money_ship" placeholder="56000">
                              <div>
                                {{$errors->first('money_ship')}}
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="note">Ghi chú</label>
                              <textarea class="form-control" id="note" rows="3" name="note" placeholder="ghi chú các món ăn ở đây (vd: thêm chanh, muối, cơm...)"></textarea>
                            </div>
                            <div class="pay">
                              <button type="submit" class="btn-pay">View Cart</button>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="number_view">
                        {{ count(Cart::content()) }}
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>


          <!-- Carousel
            ================================================== -->
            <div id="mainCarousel">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <script
                    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
                  </script>

                  <div id="googleMap">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1521.4114039102753!2d105.81605405531226!3d21.00954607902316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac9d4672b2cd%3A0xb045be285717d555!2zODcgTmfDtSBUaMOhaSBUaOG7i25oIDEsIFRo4buLbmggUXVhbmcsIMSQ4buRbmcgxJBhLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1548660510635" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                 </div>
                 <div class="container">
                  <div class="carousel-caption">
                    <a class="btn btn-lg btn-default" href="#" role="button" style="font-size:2em">Order Online Now &raquo;</a>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- /.carousel -->
        </div>
       
            @yield('content')
            @yield('cart')
            @yield('bill')
            @yield('show')
            @yield('edit')


            <!-- FOOTER -->
            <footer>
              <div class="container">
                <p class="pull-right"><a href="#"><i class="fas fa-arrow-up"></i></a></p>
                <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
              </div>
            </footer>



    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <!-- <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script> -->
      <script src="{{asset('js/jquery.min.js')}}"></script>
      <!-- <script src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
       <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
      <script src="{{asset('food/themes/dist/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('food/themes/assets/js/holder.js')}}"></script>
      <script src="{{asset('js/toastr.min.js')}}"></script>
      <script src="{{asset('js/wow.min.js')}}"></script>
      <script src="{{asset('js/sweetalert.min.js')}}"></script>
      <script src="{{asset('js/jquery.autocomplete.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/currency-autocomplete.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script>
      <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
      <script src="{{asset('js/food.js')}}"></script>
      <script src="{{asset('js/search.js')}}"></script>
      <script src="{{asset('js/dataajax.js')}}"></script>
      <script>
        $(function(){

          new WOW().init();
          $(window).scroll(function(){
            if ($(window).scrollTop() >= 300) {
              $('.navbar-collapse').addClass('fixed-header');
              $('.navbar-nav').css({'margin-left':'25%'});
                // $('nav div').addClass('visible-title');
              }
              else {
                $('.navbar-collapse').removeClass('fixed-header');
                $('.navbar-nav').css({'margin-left':'0'});
                // $('nav div').removeClass('visible-title');
              }
            });
        });
      </script>
   </body>
   </html>
