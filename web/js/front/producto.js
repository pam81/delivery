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
   var listado=new Array();
   
   simpleCart.each( function( item ){
      var id= item.get("product_id");
      var cantidad=0;
      if (listado[id]){
         cantidad = listado[id]+item.quantity();
         listado[id]= cantidad;
      }else{
         listado[id]=item.quantity();
      }
     
   
   
   });
   
  for (var key in listado ) {
        if ( $("#input-producto-"+key) ){
          $("#input-producto-"+key).val(listado[key]);
     }
   }
   

}
