
/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	
    //var hoy = moment().format("dddd"); 
	//console.log(hoy);
	
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
  
  var jqxMenuZona = $.getJSON( $("#menuZona").data("url"))
              .done(function(data) {
                  $.each(data,function(index){ 
                      var submenu = $('<ul class="submenu">');
                      var barrios = data[index].barrios;
                      $.each(barrios, function(j){
                          submenu.append(
                              $('<li>').append('<a data-id="'+barrios[j].id+'">'+barrios[j].name+'</a>')
                          
                          );
                      });
                      $('#menuZona').append(
                              $('<li>').append(  
                                     '<a data-id="'+data[index].id+'">'+data[index].name+'</a>',submenu                                        
                                          
                                ));
                  }); 
                  
              })
              .fail(function() {
                console.log( "can't load menuZona" );
              });
  
   var jqxMenuCategoria = $.getJSON( $("#menuCategoria").data("url"))
              .done(function(data) {
                  $.each(data,function(index){ 
                      var submenu = $('<ul class="submenu">');
                      var subcategorias = data[index].subcategorias;
                      $.each(subcategorias, function(j){
                          submenu.append(
                              $('<li>').append('<a data-id="'+subcategorias[j].id+'">'+subcategorias[j].name+'</a>')
                          
                          );
                      });
                    
                      $('#menuCategoria').append(
                              $('<li>').append(  
                                     '<a data-id="'+data[index].id+'">'+data[index].name+'</a>',submenu                                        
                                          
                                ));
                  }); 
                  
              })
              .fail(function() {
                console.log( "can't load menuCategoria" );
              });
              
            
              
   var jqxTiendasPremium = $.getJSON( $("#sugeridos").data("url"))
              .done(function(data) {
                 var element = '<div class="item active">';
                 var i=0;
                 var h="";
                  $.each(data,function(index){ 
                    
                    horario = data[index].horario;
                    
                    $.each(horario,function(i){
						h += horario[i]+'<br/>'; 	
					});

                    element += '<div class="col-sm-4">';
										element += '<div class="product-image-wrapper">';
										element += ' <div class="single-products">';
										element +='		<div class="productinfo text-center">';
										element +='			<img src="'+data[index].imagen+'" alt="" />';
										element +='			<a href="#" class="btn btn-warning go_tienda" data-sucursal="'+data[index].id+'"></i>Ir a la tienda</a>';
										element +='		</div> ';
										element +='<img src="'+data[index].promo+'" title="'+data[index].title +'" class="new">';
										//element +='<img src="'+data[index].open+'" class="open">';
										element += '</div>';
										                        element +='    <div class="choose">';
    									  element +='       <ul class="nav nav-pills nav-justified">';
    										element +='         <li><a href="javascript:void(0)" class="horarios_modal" data-texto="'+h+'"><i class="fa fa-clock-o"></i>Consultar horario</a>  </li>';
                        element +='         <li><a href="javascript:void(0)" class="add_favorito" data-sucursal="'+data[index].id+'"><i class="fa fa-plus-square"></i>Agregar a Favoritos</a></li>';
                        element +=' 			</ul>';
    								    element +='    </div>';
                      	element += '						</div>';
										element +='  </div>';
										element +=' </div>';
					element +=' </div>';
                    i++;
                    if (i == 3){
                      element +='</div> <div class="item">';
                      i=0;
                    }
                       
                  });
                  element += "</div>"; 
                  
                  $('#sugeridos').append(element);
                  
              })
              .fail(function() {
                console.log( "can't load tiendas premium" );
              });
              
              
      //LOGIN
     $("[data-toggle=popover]").popover({
          html: true, 
	       content: function() {
          return $('#popover-content').html();
        }
      });         
    
     
     
     
     
    
     $("body").on("click","#btnSubmitLogin",function(){
         var email = $(".popover #email").val();
         var pass = $(".popover #password").val();
        if (validateLogin(email, pass)){
            var url =$(this).data("url");
            var data = $("body #formLogin").serialize() ;
            $.ajax({
                type: "POST",
                url: url,
                dataType: 'json',
                data: data,
           })
           .done(function(data) {
                 
                
                $("#liMiCuenta").show();
                $("#btnLogin").hide();
                $("[data-toggle=popover]").popover('hide');
            
            }).fail(function(data){
               
               $("body #message").text("Email / Contraseña incorrectos").show();
            });
         }else{
              
              $("body #message").text("Email / Contraseña incorrectos").show();
         }   
    });  
   
   
    $("body").on("click","#btnRegistrarse",function(){
      $("[data-toggle=popover]").popover('hide');
      $('#registrarModal').modal("show");
    
    });
    
    $("body").on("click","#btnRecover",function(){
       $("body #formLogin").hide();
       $("body #formForgot").show();
    });
    
    $("body").on("click","#btnLoginBack", function(){
        $("body #formLogin").show();
        $("body #formForgot").hide();
    });
    
    $("body").on("click","#btn_reg",function(){
            var url =$(this).data("url");
            if ( $("#formRegister").valid() ){
               
               var data =  $("#formRegister").serialize(); 
               $.ajax({
                  type: "POST",
                  url: url,
                  dataType: 'json',
                  data: data,
               })
               .done(function(data) {
                   if (data.status == 1){
                      $("body #messageRegister").text(data.message).show();     
                   }else{  
                      $("body #messageRegister").text("Bienvenido! Se ha enviado un email a su cuenta.").show();
                      //clear register form
                      $('body #formRegister :input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
                      $('body #formRegister :checkbox, :radio').prop('checked', false); 
                      window.setTimeout( function(){ 
                            $('#registrarModal').modal("hide");
                            $("body #messageRegister").text('');
                            $("body #messageRegister").hide();
                            }, 3000 );
                            
                   } 
                
                }).fail(function(data){
                   
                   $("body #messageRegister").text("Verifique sus datos. No se ha posido crear su cuenta").show();
                });
            
            }
    
    });
    
    $("body").on("click","#btnSubmitForgot",function(){
        var email = $(".popover #emailForgot").val();
        if (validateEmail(email)){
         var url =$(this).data("url");
         var data = "email="+email; 
         $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: data,
         })
         .done(function(data) {
             if (data.status == 1){
                $("body #messageForgot").text(data.message).show();     
             }else{  
                $("body #messageForgot").text("Se le ha mandado un email a su cuenta para restablecer la contraseña").show();
             } 
          
          }).fail(function(data){
             
             $("body #messageForgot").text("Verifique sus datos. No se ha podido recuperar su contraseña").show();
          });
        
        }else{
           $("body #messageForgot").text("Ingrese un email válido").show();
        } 
    
    });
    
      $("body").on("click",".horarios_modal",function(){
            var texto=$(this).data("texto");
            $("#horarioModal .modal-body").html(texto);
            $('#horarioModal').modal("show");
      });
      
      $("body").on("click",".add_favorito",function(){
             var sucursal=$(this).data("sucursal");
             var data="sucursal="+sucursal;
             var url=$("#tiendas_listado").data("urlfavorito");
              $.ajax({
                type: "POST",
                url: url,
                dataType: 'json',
                data: data,
             })
             .done(function(data) {
                 if (data.status == 1){
                    alert(data.message);     
                 }else{  
                    alert(data.message); // deberia quitar la opción o marcarla como que esta favorito
                 } 
              
              }).fail(function(data){
                 
                 alert("No se pudo agregar como favorito");
              });
      
      });       
      
      $("body").on("click",".go_tienda",function(){
             var sucursal=$(this).data("sucursal");
             var data="sucursal="+sucursal;
             var url=$("#tiendas_listado").data("urlgo");
              $.ajax({
                type: "POST",
                url: url,
                dataType: 'json',
                data: data,
             })
             /*
             .done(function(data) {
				/*
                 if (data.status == 1){
                    alert(data.message);     
                 }else{  
                    alert(data.message); // deberia quitar la opción o marcarla como que esta favorito
                 } 
                */
              /*
                alert("los productos");
              }).fail(function(data){
                 
                 alert("Trato de mostrar productos");
              });
			*/
      });                   
      
});


function getTiendas(ubicacion){

      $.ajax({
            type: "POST",
            url: $("#tiendas_listado").data("url"),
            dataType: 'json',
            data: ubicacion,
       })
              .done(function(data) {
				  var h="";
                  $.each(data,function(index){ 
					  
					horario = data[index].horario;
                    
                    $.each(horario,function(i){
						h += horario[i]+'<br/>'; 	
					});  
                    
                    var element = '         <div class="col-sm-4">';
                      	element += '						<div class="product-image-wrapper">';
                      	element += '							<div class="single-products">';
                      	element += '									<div class="productinfo text-center">';
                      	element += '										<img src="'+data[index].imagen+'" alt="" />';
                      	element += '										<a href="" class="btn btn-warning go_tienda"  data-sucursal="'+data[index].id+'"></i>Ir a la tienda</a>';
                      	element += '									</div> ';
                        element +='<img src="'+data[index].promo+'" title="'+data[index].title +'" class="new">';
										//element +='<img src="'+data[index].open+'" class="open">';
										element += '</div>';
                      	element += '							</div>';
                        element +='    <div class="choose">';
    									  element +='       <ul class="nav nav-pills nav-justified">';
    										element +='         <li><a href="javascript:void(0)" class="horarios_modal" data-texto="'+h+'"  ><i class="fa fa-clock-o"></i>Consultar horario</a>  </li>';
                        element +='         <li><a href="javascript:void(0)" class="add_favorito" data-sucursal="'+data[index].id+'"><i class="fa fa-plus-square"></i>Agregar a Favoritos</a></li>';
                        element +=' 			</ul>';
    								    element +='    </div>';
                      	element += '						</div>';
                      	element += '					</div>';
                                                                                                       
                    
                    $('#tiendas_listado').append(element);
                       
                  }); 
                    
              })
              .fail(function() {
                console.log( "can't load tiendas" );
              });        
              
              
      
               

}
