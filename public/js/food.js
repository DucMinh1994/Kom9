
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
              <p><a class="btn btn-default btn-add" rowId="`+response.products[i].id+`"  role="button">Add to cart &raquo;</a></p>`;

              $(temp).appendTo('.sp');
            }
          }
        })
         });
         $(document).on('click','.btn-add',function(e){
          e.preventDefault();
          var id = $(this).attr('rowId');
          var select = $(".selectList"+id+" :selected").text();
          var selectId = $(".selectList"+id+" :selected").val();
          var size = $(this).attr('rowdd');
          $.ajax({
            type  :  'get',
            url   :   '/plus/'+id,
            data:{select:select , selectId : selectId , size : size},
            dataType:'json',
            success:function(response){
                var temp = `<div class="information `+response.cart.rowId+`">
                <div>`+response.cart.name+` + `+response.cart.options.size+`</div>
                <div class="quantity">
                <button class="btn-minus" rowId="`+response.cart.id+`" rowdd="`+response.cart.rowId+`" title=""><i class="fas fa-minus"></i></button>
                <div class="qty`+response.cart.rowId+`">`+response.cart.qty+`</div>
                <button class="btn-plus" rowId="`+response.cart.id+`" rowdd="`+response.cart.rowId+`" title=""><i class="fas fa-plus"></i></button>
                </div>
                <div>`+response.cart.price+`</div><span class="acs">đ</span> <a class="delete" rowId="`+response.cart.rowId+`" ><i class="fas fa-trash-alt"></i></a>
                </div>`;
              if(($('.information').hasClass(response.cart.rowId)) == false){
                  $(temp).appendTo('div.number_cart');
              }else{
                  $('.qty'+response.cart.rowId).html(response.cart.qty);
              }
              $('.into-money'+id).html(response.cart.qty*response.cart.price);
              $('.subtotal').html(response.subtotal);
              $('.number_view').html(response.count);
              toastr.success('Thêm sản phẩm thành công!');
            }
          })
        });
         $(document).on('click','.btn-plus',function(e){
          e.preventDefault();
          var id = $(this).attr('rowId');
          var size = $(this).attr('rowdd');
          $.ajax({
            type  :  'get',
            url   :   '/muathem/'+id,
            data:{ size : size},
            dataType:'json',
            success:function(response){
               $('.qty'+response.rowId).html(response.qty);
               $('.subtotal').html(response.subtotal);
              $('.number_view').html(response.count);
              toastr.success('Thêm sản phẩm thành công!');
            }
          })
        });
         $(document).on('click','.btn-minus',function(e){
          e.preventDefault();
          var id = $(this).attr('rowId');
          var rowId = $(this).attr('rowdd');
          $.ajax({
            type    :   'get',
            url     :   '/minus/'+ id,
            data:{ rowId : rowId},
            dataType:'json',
            success : function(response){
              if(response.delete == 'true'){
                $('.'+rowId).remove();
                $('.tr'+rowId).remove();
              }
              $('.into-money'+id).html(response.qty*response.price);
              $('.subtotal').html(response.subtotal);
               $('.qty'+response.rowId).html(response.qty);
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