/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
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
              
     //LOGIN
     $("[data-toggle=popover]").popover({
          html: true, 
	       content: function() {
          return $('#popover-content').html();
        }
      });         
    
     var cookie = $.cookie(COOKIE_NAME);
     var User = null;
     if (cookie) {
            var options = JSON.parse(cookie);
            User = options;
            $("#miCuenta").show();
            $("#btnLogin").hide();
    }else{
            $("#miCuenta").hide();
            $("#btnLogin").show();
    }
    
    
    /*var validateLogin = $("#formLogin").validate({
			rules: {
				"email": {
					required:true,
					maxlength:100,
          email: true
				},
        "password":{
        	required:true,
          maxlength:100          	
        }
			},
			
			 messages: {
            "email": {
            required: "Olvido ingresar el usuario",
            maxlength:  jQuery.validator.format("Máximo {0} carácteres!"),
            email: "Email no válido"
            },
            "password": {
            required: "Olvido ingresar su contraseña",
            maxlength:  jQuery.validator.format("Máximo {0} carácteres!"),
            }
      },
      
      errorPlacement: function(error, element) {
             
            	error.appendTo( element.next() );
        }
			
		});*/
           
    $("body").on("click","#btnSubmitLogin",function(){
        
        //var retorna = validateLogin.form();
        var url =$(this).data("url");
        var data = $("body #formLogin").serialize()
        $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            data: data,
       })
       .done(function(data) {
             
            $.cookie(COOKIE_NAME, JSON.stringify(data.user), { path: '/'});
            User = data.user;
            $("#miCuenta").show();
            $("#btnLogin").hide();
            $("[data-toggle=popover]").popover('hide');
        
        }).fail(function(data){
           
           $("body #message").text("Usuario / Contraseña incorrectos").show();
        });
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
                  $.each(data,function(index){ 
                    
                    var element = '         <div class="col-sm-4">';
                      	element += '						<div class="product-image-wrapper">';
                      	element += '							<div class="single-products">';
                      	element += '									<div class="productinfo text-center">';
                      	element += '										<img src="'+data[index].imagen+'" alt="" />';
                      	element += '										<a href="#" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>Ver productos</a>';
                      	element += '									</div> ';
                        if (data[index].estado == 1){
                      	   element += '									<img src="images/home/sale.png" class="new" alt="open" />';
                        }
                      	element += '							</div>';
                        element +='    <div class="choose">';
    									  element +='       <ul class="nav nav-pills nav-justified">';
    										element +='         <li><a href="#"><i class="fa fa-clock-o"></i>Consultar horario </a></li>';
                        element +='         <li><a href="#"><i class="fa fa-plus-square"></i>Agregar a Favoritos</a></li>';
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
              
              
      
              $.ajax({
            type: "POST",
            url: $("#sugeridos").data("url"),
            dataType: 'json',
            data: ubicacion,
       })
              .done(function(data) {
                 var element = '<div class="item active">';
                 var i=0;
                  $.each(data,function(index){ 
                    
                    element += '<div class="col-sm-4">';
										element += '<div class="product-image-wrapper">';
										element += ' <div class="single-products">';
										element +='		<div class="productinfo text-center">';
										element +='			<img src="'+data[index].imagen+'" alt="" />';
										element +='			<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ver productos</a>';
										element +='		</div> ';
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

}