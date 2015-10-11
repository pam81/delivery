$(document).ready(function(){

 
  
  simpleCart.bind( 'ready' , function(){
      loadTablaCarrito();
  });
  
  
  $("body").on("click",".cart_quantity_up",function(){
        var itemId = $(this).data("id");
        var myItem = simpleCart.find( itemId );
        myItem.increment( 1 );
        simpleCart.update();
        $("#item"+itemId).val(myItem.quantity());
        $("#total_producto"+itemId).text("$"+myItem.total());
  });
  
  $("body").on("click",".cart_quantity_down",function(){
        var itemId = $(this).data("id");
        var myItem = simpleCart.find( itemId );
        myItem.decrement( 1 );
        simpleCart.update();
        $("#item"+itemId).val(myItem.quantity());
        $("#total_producto"+itemId).text("$"+myItem.total());
  });
  
  $("body").on("click",".cart_quantity_delete",function(){
         var itemId = $(this).data("id");
         var myItem = simpleCart.find( itemId );
         myItem.remove();
         simpleCart.update();
         $("#row"+itemId).remove();
  });
  
  
  
});

function loadTablaCarrito(){

 var tbody=$("#table-carrito");
  
  simpleCart.each( function( item ){
    var element='<tr id="row'+item.id()+'">';
				element +='   <td class="cart_image"><img src=" '+item.get('thumb')+ '  " alt="" class="img-responsive"> </td>';
        element +='   <td class="cart_description"><h4>'+item.get('name')+'</h4> </td>';
        element +='   <td class="cart_price"> <p>$'+item.price()+'</p></td>';
        element +='   <td class="cart_quantity"><div class="cart_quantity_button">';
				element +='					<a class="cart_quantity_up" role="button" href="javascript:;" data-id="'+item.id()+'"> + </a>';
				element +='					<input class="cart_quantity_input" type="text" name="quantity" id="item'+item.id()+'" value="'+item.quantity()+'" autocomplete="off" readonly size="2">';
				element	+='				<a class="cart_quantity_down" role="button" href="javascript:;" data-id="'+item.id()+'"> - </a>';
				element	+='				</div> </td>';
        element	+='      <td class="cart_total"><p class="cart_total_price" id="total_producto'+item.id()+'">$'+item.total()+'</p> </td>';
        element	+='      <td class="cart_delete"><a class="cart_quantity_delete" href="javascript:;" data-id="'+item.id()+'"><i class="fa fa-times"></i></a> </td>';
				element	+='	</tr>';	
    
    tbody.append(element);
  });

}