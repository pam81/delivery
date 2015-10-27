$(document).ready(function(){ 
 
 $("#btnCarrito").popover({
          html: true, 
          content: function() {
           if (simpleCart.quantity() > 0){
              return $('#carrito-content').html();
          }else{
              return "<p>Aún no has realizado compras!</p>";
          }
        }
  });
      
 
simpleCart({
        /*checkout: { 
            type: "SendForm" , 
            url: "checkout.php",
            method: "POST" 
        },*/
        cartStyle: 'table',
        cartColumns: [
                        {
                          attr: "sucursal",
                          label: "Comercio",
                          view: function( item , column ){
                              if (item.get("sucursalImg")){
                               return "<img src=\""+item.get("sucursalImg")+"\" width=\"50\" height=\"50\">"; 
                              }else{
                                return "<span>"+item.get("sucursalName")+"</span>";
                              }
                          } 
                          
                        },
                        {
                            attr: "name",
                            label: "Producto"
                        }, 
                        {
                            attr: "price",
                            label: "Precio",
                            view: 'currency'
                        }, 
                         { view: "decrement" , label: false , text: "-" } ,
        
        
                        { 	attr: "quantity" ,
                        	
                          label: "Cantidad",
                           
                          
                         },
                         { view: "increment" , label: false , text: "+" } ,
                        {
                            view: "remove",
                            label: false
                        }  
            
        ]
        
    });


      
 $(".slider-plus").on("click",function(){
    
     var id = $(this).data("id");
     var thumb =$(this).data("thumb");
     var name =$(this).data("name");
     var price =$(this).data("price");
     var sucursalId =$(this).data("sucursalid");
     var sucursalImg =$(this).data("sucursalimg");
     var sucursalName =$(this).data("sucursalname"); 
     var input = $("#input-producto-"+id);
     var value = parseInt(input.val())+1;
     if (value < 100){
        input.val(value);
        //aumento de uno en el carrito
        simpleCart.add({thumb: thumb,name: name, quantity: 1, price: price, product_id: id, sucursal: sucursalId, sucursalImg: sucursalImg, sucursalName: sucursalName});
     }
     
 
 });  
 
 $(".slider-minus").on("click",function(){
    
     var id = $(this).data("id");
     var input = $("#input-producto-"+id);
     var value = parseInt(input.val())-1;
     if (value >= 0){
        input.val(value);
        //resto de a uno del carrito
        var myItem = simpleCart.find( {product_id: id} );
        myItem[0].decrement( 1 );
        simpleCart.update();
        
     }
     
 });
 
       
      
});      