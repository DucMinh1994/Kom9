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
                   var money = 0;
                    for (var i = 0; i < response.arr.length; i++) {
                      temp = `<tr class="tr">
                              <td>`+(Number(i)+1)+`</td>
                              <td>`+response.arr[i].name+`</td>
                              <td class="qty">`+response.orderdetail[i].soluong+`</td>
                              <td>`+response.arr[i].price+`</td>
                              <td>`+response.orderdetail[i].soluong*response.arr[i].price+`</td>
                            </tr>`
                      $(temp).appendTo('#in');
                      money = money + Number(response.arr[i].price);
                      $('.money-tt').html(money);
                    }
                    $('.money-sale').html(response.order.status);
                    $('.money-ship').html(response.order.money_ship);
                    $('.money-total').html(response.order.total);
                }
              })  
          });
          $(document).on('click','.btn-delete',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
              swal({
              title: "Bạn có muốn xóa không?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                  type : 'delete',
                  url : '/bill/' + id,
                  success : function(response){
                    $(this).parents('tr').remove();
                    $('#users-table').DataTable().ajax.reload(null,false);
                  }
                })
              }
            });
          });
          $(document).on('click','.btn-edit',function(e){
            e.preventDefault();
             $("tr").remove(".tr");
            var id = $(this).attr('data-id');
             $.ajax({
              type : 'get',
              url : '/bill/'+id,
              success : function(response){
                var money = 0;
                for (var i = 0; i < response.arr.length; i++) {
                      temp = `<tr class="tr">
                              <td>`+(Number(i)+1)+`</td>
                              <td>`+response.arr[i].name+`</td>
                              <td class="qty">`+response.orderdetail[i].soluong+`</td>
                              <td>`+response.arr[i].price+`</td>
                              <td>`+response.orderdetail[i].soluong*response.arr[i].price+`</td>
                            </tr>`
                      $(temp).appendTo('#now');
                      money = money + Number(response.arr[i].price);
                      $('.money-tt').html(money);
                    }
                    $('.money-sale').html(response.order.status);
                    $('.money-ship').html(response.order.money_ship);
                    $('.money-total').html(response.order.total);
                    $('input.name').val(response.order.name);
                    $('input.address').val(response.order.address);
                    $('input.mobile').val(response.order.mobile);
                    $('input.sale').val(response.order.status);
                    $('input.money_ship').val(response.order.money_ship);
                    $('input.note').val(response.order.note);
                    $('.save').attr('data-id',response.order.id);
              }
             })
          });
          $(document).on('click','.save',function(e){
            var id = $(this).attr('data-id');
            var formData = {
            name : $('.name').val(),
            address : $('.address').val(),
            mobile : $('.mobile').val(),
            sale : $('.sale').val(),
            money_ship : $('.money_ship').val(),
            note : $('.note').val()
          };
            $.ajax({
              type : 'PUT',
              url  : '/bill/' + id,
              data: JSON.stringify(formData),
              dataType: 'json',
              contentType: 'application/json',
              success : function(response){
                toastr.success('Sửa thành công!');
                $('#users-table').DataTable().ajax.reload(null,false);
                $('#modal-edit').modal('hide');
              }
            })
          });
        });