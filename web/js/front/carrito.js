$(document).ready(function(){ 
 
 $("#btnCarrito").popover({
          html: true, 
          template: '<div class="popover" role="tooltip" style="width: 500px;"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"><div class="data-content"></div></div></div>',
          content: function() {
          return $('#carrito-content').html();
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
     var input = $("#input-producto-"+id);
     var value = parseInt(input.val())+1;
     if (value < 100){
        input.val(value);
        //aumento de uno en el carrito
        simpleCart.add({thumb: thumb,name: name, quantity: 1, price: price, product_id: id});
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