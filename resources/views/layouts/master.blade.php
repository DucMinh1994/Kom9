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
          .error{
            color: red;
          }
          .fa-eye{
            color: #5bc0de;
            font-size: 15px;
          }
          .fa-edit{
            color: #428bca;
            font-size: 15px;
          }
          .fa-delete{
            font-size: 15px;
            color: #d9534f;
            font-weight: bold;
          }

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
                    <a class="navbar-brand" href="index.html">Bootstrap Restaurant</a>
                  </div>
                  <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                      <li class="active"><a href="index.html">Home</a></li>
                      <li><a href="about.html">About Us</a></li>
                      <li><a href="contact.html">Contact</a></li>
                      <li><a href="#tablebooking">Table Booking</a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Indina <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">DRINKS</a></li>
                          <li><a href="#">STARTERS</a></li>
                          <li><a href="#">TANDOORI - CLAY OVEN - DISHES</a></li>
                          <li class="divider"></li>
                          <li class="dropdown-header">SEAFOOD MAIN COURSES</li>
                          <li><a href="#">CHICKEN MAIN COURSES</a></li>
                          <li><a href="#">LAMB MAIN COURSES</a></li>
                          <li><a href="#">RICE/BREDS</a></li>
                          <li><a href="#">ACCOMPANIMENTS</a></li>
                        </ul>
                      </li>
                      
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Italian <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">DRINKS</a></li>
                          <li><a href="#">STARTERS</a></li>
                          <li><a href="#">TANDOORI - CLAY OVEN - DISHES</a></li>
                          <li class="divider"></li>
                          <li class="dropdown-header">SEAFOOD MAIN COURSES</li>
                          <li><a href="#">CHICKEN MAIN COURSES</a></li>
                          <li><a href="#">LAMB MAIN COURSES</a></li>
                          <li><a href="#">RICE/BREDS</a></li>
                          <li><a href="#">ACCOMPANIMENTS</a></li>
                        </ul>
                      </li>
                      
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chines <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">DRINKS</a></li>
                          <li><a href="#">STARTERS</a></li>
                          <li><a href="#">TANDOORI - CLAY OVEN - DISHES</a></li>
                          <li class="divider"></li>
                          <li class="dropdown-header">SEAFOOD MAIN COURSES</li>
                          <li><a href="#">CHICKEN MAIN COURSES</a></li>
                          <li><a href="#">LAMB MAIN COURSES</a></li>
                          <li><a href="#">RICE/BREDS</a></li>
                          <li><a href="#">ACCOMPANIMENTS</a></li>
                        </ul>
                      </li>
                      <li><a class="fas-cart" href="" title=""><i class="fas fa-cart-plus"></i></a>
                        <div class="cart">
                          <h3>Hóa Đơn</h3>
                          <div class="number_cart">
                            <?php foreach (Cart::content() as $data): ?>
                              <div class="information {{$data->id}}">
                                <div>{{$data->name}}</div>
                                <div class="quantity">
                                  <button href="" class="btn-minus" rowId="{{$data->id}}" title=""><i class="fas fa-minus"></i></button> 
                                  <div class="qty{{$data->id}}">{{$data->qty}}</div> 
                                  <button href="" class="btn-plus btn-add" rowId="{{$data->id}}" title=""><i class="fas fa-plus"></i></button>
                                </div>
                                <div class="money-sp">{{$data->price}}</div><span class="acs">đ</span> <a class="delete" rowId="{{$data->id}}"><i class="fas fa-trash-alt"></i></a>
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

       <!--  <div class="mainTitle">
         <div class="container">
           <h1>Bootstrappage Restaurant</h1>
           <p>
             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
           </p>
         </div>
       </div> -->

          <!-- Marketing messaging and featurettes
            ================================================== -->
            <!-- Wrap the rest of the page in another container to center all the content. -->

            @yield('content')
            @yield('cart')
            @yield('bill')
            @yield('show')


            <!-- FOOTER -->
            <footer>
              <div class="container">
                <p class="pull-right"><a href="#">Back to top</a></p>
                <p>&copy; 2014 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
              </div>
            </footer>



    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
      <script src="{{asset('food/themes/dist/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('food/themes/assets/js/holder.js')}}"></script>
      <script src="{{asset('js/toastr.min.js')}}"></script>
      <script src="{{asset('js/wow.min.js')}}"></script>
      <script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/sweetalert.min.js')}}"></script>
      <script src="{{asset('js/jquery.autocomplete.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/currency-autocomplete.js')}}"></script>
      <!-- <script type="text/javascript" src="{{asset('js/food.js')}}"></script> -->
      <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script>
      <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
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
      <script>
        $(function(){
          $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/bill',
            columns: [
            { data: 'id', name: 'id' },
            { data: 'code', name: 'code' },
            { data: 'name', name: 'name' },
            { data: 'mobile', name: 'mobile' },
            { data: 'address', name: 'address' },
            { data: 'status', name: 'status' },
            { data: 'money_ship', name: 'money_ship' },
            { data: 'total', name: 'total' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
          });
          $(document).on('click','.btn-show',function(){
              var id = $(this).attr('data-id');
              $("tr").remove(".tr");
              $.ajax({
                type : 'get',
                url  : '/bill/'+id,
                success : function(response){
                  console.log(response);
                    for (var i = 0; i < response.arr.length; i++) {
                      temp = `<tr class="tr">
                              <td>`+(Number(i)+1)+`</td>
                              <td>`+response.arr[i].name+`</td>
                              <td class="qty">`+response.orderdetail[i].soluong+`</td>
                              <td>`+response.arr[i].price+`</td>
                              <td>`+response.orderdetail[i].soluong*response.arr[i].price+`</td>
                            </tr>`
                      $(temp).appendTo('#in');
                    }

                }
              })  
          })
        });
      </script>
      <script type="text/javascript">

        $(function(){
         $('.fas-cart').click(function(e){
          e.preventDefault();
          $('.cart').toggle('slow');

        });
         $('.print').click(function(){
          $('footer').css({'display':'none'})
          $(this).css({'display':'none'})
          $('#mainCarousel').css({'display':'none'})
          $('.non').css({'display':'none'})
          window.print();
          window.location.replace("http://test.kom9.com/");
        })
         $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
         $(document).on('click', '.menu', function(e){
           e.preventDefault();
           var id = $(this).attr('data-id');
           var name = $(this).attr('data-name');
           $.ajax({
            type  :  'get',
            url   :   '/menu/'+id,
            success:function(response){
             $('.product').css({'display' : 'none'});
             for (var i = 0; i < response.products.length; i++) {
              var temp = `<div class="col-lg-2 product wow slideInDown">
              <img src="../food/themes/assets/images/salate.png" alt="Generic placeholder image">
              <h4 class="name">`+response.products[i].name+`</h4>
              <h4 class="price">`+response.products[i].price+`<span>đ</span></h4>
              <p><a class="btn btn-default btn-add    " rowId="`+response.products[i].id+`"  role="button">Add to cart &raquo;</a></p>`;

              $(temp).appendTo('.sp');
            }
          }
        })
         });
         $(document).on('click','.btn-add',function(e){
          e.preventDefault();
          var id = $(this).attr('rowId');
          $.ajax({
            type  :  'get',
            url   :   '/plus/'+id,
            success:function(response){
              if(($('.information').hasClass(response.cart.id)) == false){
                var temp = `<div class="information `+response.cart.id+`">
                <div>`+response.cart.name+`</div>
                <div class="quantity">
                <button class="btn-minus" rowId="`+response.cart.id+`" title=""><i class="fas fa-minus"></i></button>
                <div class="qty`+response.cart.id+`">`+response.cart.qty+`</div>
                <button class="btn-plus btn-add" rowId="`+response.cart.id+`" title=""><i class="fas fa-plus"></i></button>
                </div>
                <div>`+response.cart.price+`</div><span class="acs">đ</span> <a class="delete" rowId="`+response.cart.id+`"><i class="fas fa-trash-alt"></i></a>
                </div>`;
                $(temp).appendTo('div.number_cart');
              }else{
                $('.qty'+response.cart.id).html(response.cart.qty);
              }
              $('.into-money'+id).html(response.cart.qty*response.cart.price);
              $('.subtotal').html(response.subtotal);
              $('.number_view').html(response.count);
              toastr.success('Thêm sản phẩm thành công!');
            }
          })
        });
         $(document).on('click','.btn-minus',function(e){
          e.preventDefault();
          var id = $(this).attr('rowId');
          $.ajax({
            type    :   'get',
            url     :   '/minus/'+ id,
            success : function(response){
              if(response.delete == 'true'){
                $('.'+id).remove();
                $('.tr'+id).remove();
                console.log('ssdsd');
              }
              $('.into-money'+id).html(response.qty*response.price);
              $('.subtotal').html(response.subtotal);
              $('.qty'+id).html(response.qty);
              $('.number_view').html(response.count);
              toastr.warning('Sản phẩm đã bị trừ trong giỏ hàng!');
            }
          })
        });
         $(document).on('click','.delete',function(e){
          e.preventDefault();
          var id = $(this).attr('rowId');
          swal({
            title: "Bạn có muốn xóa không?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
             $.ajax({
              type:'delete',
              url:  '/' + id,
              success: function(response){
                $('.'+id).remove();
                $('.tr'+id).remove();
                $('.subtotal').html(response.subtotal);
                $('.number_view').html(response.count);
              }
            })
             swal("Sản phẩm đã được gỡ bỏ khỏi giỏ hàng!", {
              icon: "success",
            });
           }
         });
        });
         $('#frm-cc').validate({
          rules:{
            address : {
              required : true
            },
            money_ship : {
              required : true
            },
            mobile : {
              required : true,
              number  : true,
              rangelength: [9, 11]
            },
          },
          messages : {
            address : {
              required : "Địa chỉ không được bỏ trống",
            },
            money_ship : {
              required : "Tiền ship không được bỏ trống",
            },
            mobile : {
              required : "SĐT không được bỏ trống",
              number : "SĐT phải là số",
              rangelength : "SĐT có độ dài từ 9 -> 11 số",
            },
          }
        })
       }); 
     </script>
     @yield('ajax') 
   </body>
   </html>
