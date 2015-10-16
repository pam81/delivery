$(document).ready(function(){

   simpleCart.bind( 'ready' , function(){
      loadCantidad();
  });
});

function loadCantidad(){

//si el producto que muestro de la tienda esta en el 
   //carrito le cargo la cantidad que esta comprando
   simpleCart.each( function( item ){
      var id= item.get("product_id");
     if ( $("#input-producto-"+id) ){
          $("#input-producto-"+id).val(item.quantity());
     }
   
   
   });

}

