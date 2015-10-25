$(document).ready(function(){

   simpleCart.bind( 'ready' , function(){
       loadCantidad();
  });

    $("#search-button").on('click',function(){

        var path=$(this).data("url");
        var query=$("#search-query").val();
        if (query != '')
            path = path +'/'+query;

        $("#custom-search-form").attr('action',path);
        $("#custom-search-form").submit();


    });

    $("#search-query").keyup(function(event){
        if(event.keyCode == 13){
            $("#search-button").click();
        }
    });

});

function loadCantidad(){

//si el producto que muestro de la tienda esta en el 
   //carrito le cargo la cantidad que esta comprando
   simpleCart.each( function( item ){
      var id= item.get("product_id");
       console.log(id);
     if ( $("#input-producto-"+id) ){
          $("#input-producto-"+id).val(item.quantity());
     }
   
   
   });

}
