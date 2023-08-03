
$.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

function addToCartBtn(product_id)
{
      var product_id=product_id;
      $.ajax({
            method:"POST",
            url:"/add-to-cart",
            data:{
                  'product_id':product_id,
            },
            success:function(response,res) {
                  $('.cart-button').load(location.href+" .cart-button");
                  //alert(res);
                  swal(response.status);
            }
      });
}

function removeFromCartBtn(product_id)
{
      var product_id=product_id;
      $.ajax({
            method:"POST",
            url:"/remove-from-cart",
            data:{
                  'product_id':product_id,
            },
            success:function(response,res) {
                  $('.cart-button').load(location.href+" .cart-button");
                  //alert(res);
                  // swal(response.status);
                  location.reload();
            }
      });
}

function incrementProduct(el)
{
      var product_id=el.id;
      var old_qty=el.name;
      var new_qty=el.value;
      if(old_qty>new_qty)
      {
            $.ajax({
                  method:"POST",
                  url:"/decrement-cart",
                  data:{
                        'product_id':product_id,
                  },
                  success:function(response,res) {
                        $('.cartlistitems').load(location.href+" .cartlistitems");
                        $('.cart-button').load(location.href+" .cart-button");
                        //alert(res);
                        swal(response.status);
                        // location.reload();
                  }
      });
      }
      else
      {
      $.ajax({
            method:"POST",
            url:"/increment-cart",
            data:{
                  'product_id':product_id,
            },
            success:function(response,res) {
                  $('.cartlistitems').load(location.href+" .cartlistitems");
                  $('.cart-button').load(location.href+" .cart-button");
                  //alert(res);
                  swal(response.status);
                  // location.reload();
            }
      });
      }

}

