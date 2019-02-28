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
                        console.log('.tr'+id);
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
    })
  }); 