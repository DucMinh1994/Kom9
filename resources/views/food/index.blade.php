@extends('layouts.master')
@section('content')
<div class="container marketing">
  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="col-lg-4">
      <img class="img-circle" src="{{asset('food/themes/assets/images/nepali-momo.png')}}" alt="Generic placeholder image">
      <h2>Nepalese MOMO</h2>
      <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies</p>
      <p><a class="btn btn-default" href="#" role="button">&pound; 2.2 Add to cart &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img class="img-circle" src="{{asset('food/themes/assets/images/burger.png')}}" alt="Generic placeholder image">
      <h2>Burger</h2>
      <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. </p>
      <p><a class="btn btn-default" href="#" role="button">&pound;5 Add to cart &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img class="img-circle" src="{{asset('food/themes/assets/images/gorkha-special-chicken.png')}}" alt="Lam Tikka">
      <h2>Gurkha Chicken</h2>
      <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. </p>
      <p><a class="btn btn-default" href="#" role="button">&pound;4 Add to cart &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->
</div>


<div class="introSection">
  <div class="container">
    <div class="row">
     <div class="col-lg-12">
      <!-- <form action="" method="get" role="form"> -->
      <?php foreach ($categories as $category): ?>
        <a class="btn menu" data-id="{{$category->id}}" data-name="{{$category->name}}" href="" title="">{{$category->name}}</a>
       <!--  <button type="button" class="btn menu" data-id="{{$category->id}}" data-name="{{$category->name}}">{{$category->name}}</button> -->
      <?php endforeach ?>
      <!-- </form> -->
    </div>
  </div>
</div>
</div>


<div class="container">
  <div class="row sp">
    <?php foreach ($products as $product): ?>
     <div class="col-lg-2 product wow slideInDown">
      <img src="{{asset('food/themes/assets/images/salate.png')}}" alt="Generic placeholder image">
      <h4 class="name">{{$product->name}}</h4>
      <h4 class="price">{{number_format($product->price)}} <span>đ</span></h4>
      <p><a class="btn btn-default btn-add" rowId="{{$product->id}}" href="" role="button">Add to cart &raquo;</a></p>
    </div>
  <?php endforeach ?>
</div>
</div>




<!-- sdsdsd -->
<div class="container marketing">
  <h2 class="itemsTitle">Breakfast</h2>
  <div id="myCarousel1" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-inner">
      <div class="item active">
       <div class="row">
      
        <div class="col-lg-2 product">
          <img src="{{asset('food/themes/assets/images/salate.png')}}" alt="Generic placeholder image">
          <h4>Salates</h4>
          <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        
      </div><!-- /.row -->

    </div>
  </div>
</div><!-- /.carousel -->
</div>

<div class="container marketing">
  <h2 class="itemsTitle">Lunch</h2>
  <div id="myCarousel2" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-inner">
      <div class="item active">
       <div class="row">
        <div class="col-lg-4">
         <img src="{{asset('food/themes/assets/images/salate.png')}}" alt="Generic placeholder image">
         <h4>Salates</h4>
         <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
       </div><!-- /.col-lg-4 -->
       <div class="col-lg-4">
         <img src="{{asset('food/themes/assets/images/chicken.png')}}" alt="Generic placeholder image">
         <h4>Meal</h4>
         <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
       </div><!-- /.col-lg-4 -->
       <div class="col-lg-4">
        <img src="{{asset('food/themes/assets/images/drinks_lussy.png')}}" alt="Generic placeholder image">
        <h4>Drink</h4>
        <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

  </div>
  <div class="item">
   <div class="row">
    <div class="col-lg-4">
      <img src="{{asset('food/themes/assets/images/chicken_fry.png')}}" alt="Generic placeholder image">
      <h4>Salates</h4>
      <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img src="{{asset('food/themes/assets/images/fish-and-chips.png')}}" alt="Generic placeholder image">
      <h4>Meal</h4>
      <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img src="{{asset('food/themes/assets/images/drinks.png')}}" alt="Generic placeholder image">
      <h4>Drink</h4>
      <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->

</div>
<div class="item">
  <div class="row">
    <div class="col-lg-4">
      <img  src="{{asset('food/themes/assets/images/salate.png')}}" alt="Generic placeholder image">
      <h4>Salates</h4>
      <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img  src="{{asset('food/themes/assets/images/burger.png')}}" alt="Generic placeholder image">
      <h4>Meal</h4>
      <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
    <div class="col-lg-4">
      <img  src="{{asset('food/themes/assets/images/drinks.png')}}" alt="Generic placeholder image">
      <h4>Drink</h4>
      <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
  </div><!-- /.row -->
</div>
</div>
<a class="left carousel-control" href="#myCarousel2" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
<a class="right carousel-control" href="#myCarousel2" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->
</div>

<div class="container marketing">
  <h2 class="itemsTitle">Dinner</h2>
  <div id="myCarousel3" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-inner">
      <div class="item active">
       <div class="row">
        <div class="col-lg-4">
          <img src="{{asset('food/themes/assets/images/chicken_fry.png')}}" alt="Generic placeholder image">
          <h4>Chicken</h4>
          <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="{{asset('food/themes/assets/images/rice.png')}}" alt="Generic placeholder image">
          <h4>Rice</h4>
          <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="{{asset('food/themes/assets/images/drinks.png')}}" alt="Generic placeholder image">
          <h4>Drink</h4>
          <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

    </div>
    <div class="item">
     <div class="row">
      <div class="col-lg-4">
        <img src="{{asset('food/themes/assets/images/courinder.png')}}" alt="Generic placeholder image">
        <h4>Salates</h4>
        <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="{{asset('food/themes/assets/images/burger.png')}}" alt="Generic placeholder image">
        <h4>Meal</h4>
        <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="{{asset('food/themes/assets/images/drinks.png')}}" alt="Generic placeholder image">
        <h4>Drink</h4>
        <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

  </div>
  <div class="item">
    <div class="row">
      <div class="col-lg-4">
        <img  src="{{asset('food/themes/assets/images/salate.png')}}" alt="Generic placeholder image">
        <h4>Salates</h4>
        <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img  src="{{asset('food/themes/assets/images/chicken_fry.png')}}" alt="Generic placeholder image">
        <h4>Chicken</h4>
        <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img  src="{{asset('food/themes/assets/images/drinks.png')}}" alt="Generic placeholder image">
        <h4>Drink</h4>
        <p><a class="btn btn-default" href="#" role="button">Add to cart &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
  </div>
</div>
<a class="left carousel-control" href="#myCarousel3" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
<a class="right carousel-control" href="#myCarousel3" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->
</div>


<div class="highlightSection">
  <div class="container">
   <div class="row">
    <div class="col-lg-4">
      <div class="media">
       <a href="menu/"><img src="{{asset('food/themes/assets/images/nepali-momo.png')}}" alt="nepali-momo"> </a>
       <h3 class="media-heading text-primary-theme">NEPALESE LAMB MOMO</h3>
       <p>Steamed dumplings filled with slightly spiced minced meat served with special sauce.</p>
     </div>
   </div>
   <div class="col-lg-4">
    <div class="media"><a href="menu/"><img src="{{asset('food/themes/assets/images/gorkha-special-chicken.png')}}" alt="GURKHA SPECIAL CHICKEN"> </a>            
      <h3 class="media-heading text-danger-theme">GURKHA SPECIAL CHICKEN</h3>
      <p>Boneless chicken marinated in mustard, smoked chilli, herbs and spices slowly cooked in tandoor. </p>

    </div>
  </div>
  <div class="col-lg-4">
    <div class="media">
      <a href="menu/"><img src="{{asset('food/themes/assets/images/lam-tikka.png')}}" alt="Lam Tikka"> </a>
      <h3 class="media-heading">LAMB TIKKA SPECIAL</h3>
      <p>Tender pieces of lamb mixed with our own spices and gently cooked in clay oven. </p>
    </div>
  </div>
</div>
</div>
</div>



<div class="introSection">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <h3>Welcome to restaurent</h3>
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
          text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
          It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <br><br>
          It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
          and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
      </div>

      <div class="col-lg-4">
        <h3>Welcome to restaurent</h3>
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
          text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
          It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <br><br>

        </p>

      </div>

      <div class="col-lg-3">
        <h3>Welcome to restaurent</h3>
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
          text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 

        </p>

      </div>

    </div>
  </div>
</div>


<div class="container marketing">
 <div id="myCarousel4" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-inner">
    <div class="item active">
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Fish and Chips <span class="text-muted">It's very very testy</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img src="{{asset('food/themes/assets/images/fish-and-chips.png')}}" alt="Fish and Chips">
        </div>
      </div>
    </div>


    <div class="item">
      <div class="row featurette">
        <div class="col-md-5">
          <img src="{{asset('food/themes/assets/images/burger.png')}}" alt="Generic placeholder image">
        </div>
        <div class="col-md-7">
          <h2 class="featurette-heading">Oh yeah, very nice Burger. <span class="text-muted">Delicious.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
      </div>
    </div>


    <div class="item">
      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Try yourself <span class="text-muted">Testy</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>  
        <div class="col-md-5">
          <img class="img-circle" src="{{asset('food/themes/assets/images/drinks.png')}}" alt="Generic placeholder image">
        </div>
      </div>
    </div>
  </div>
</div><!-- /.carousel -->   
</div><!-- /.container -->
<!-- /END THE FEATURETTES -->
@endsection
@section('ajax')
<!-- <script>
  $(function(){
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
                        <img src="{{asset('food/themes/assets/images/salate.png')}}" alt="Generic placeholder image">
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
          }
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
                        $('.subtotal').html(response.subtotal);
                        $('.number_view').html(response.count);
                    }
                })
                    swal("Sản phẩm đã được gỡ bỏ khỏi giỏ hàng!", {
                    icon: "success",
                  });
              }
            });
    })
  });  
</script> -->
@endsection