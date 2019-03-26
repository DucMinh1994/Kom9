$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"/live_search",
   type:'POST',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('.product').css({'display':'none'});
    $('.sp').html(data.table_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});