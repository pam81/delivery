
/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function() {

    $('#see_more').hide();
    $('#title_mira').hide();

    $('#zona-id').val(0);
    $('#categoria-id').val(0);

    var day = moment().weekday();
    var time = moment().format('HH:mm');
    console.log(day);
    console.log(time);

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


/*
    var jqxMenuCategoria = $.getJSON( $("#menuCategoria").data("url"))
        .done(function(data) {

            projects = data;
            console.log(data);
            /*
            projects = new Array();
            $.each(data,function(index) {

                projects = {value: data[index].id, label: data[index].name};
            });
            return projects;

           alert(projects);

        });
 */

    $.ui.autocomplete.prototype._renderItem = function (ul, item) {
        return $("<li>")
            .append($("<a>").text(item.label))
            .appendTo(ul);

    };

    $.widget("custom.catcomplete", $.ui.autocomplete, {
        _renderMenu: function (ul, items) {
            var that = this,
                currentCategory = "";
            $.each(items, function (index, item) {
                if (item.category != currentCategory) {
                    ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
                    currentCategory = item.category;

                }
                that._renderItemData(ul, item);

            });
        }
    });

    $(function () {
        $("#categoria").catcomplete({
            delay: 0,
            source: function (request, response) {
                //$.get("http://ws.spotify.com/search/1/track.json", {
                $.get($("#menuCategoria").data("url"),{
                    q: request.term
                }, function (data) {
                    //response($.map(data.tracks.slice(0, 5), function (item) {
                    response($.map(data,function (item){
                        return { value: item.id, label: item.name,
                            category: item.category };
                    }));
                });
            },

            focus: function (event, ui) {
                $("#categoria").val(ui.item.label);
                return false;
            },
            select: function (event, ui) {
                $("#categoria").val(ui.item.label);
                $("#categoria-id").val(ui.item.value);
                return false;
            }
        });
    });

/*
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
*/

    $.ui.autocomplete.prototype._renderItem = function (ul, item) {
        return $("<li>")
            .data( "ui-autocomplete-item", item )
            .append($("<a>").text(item.label))
            .appendTo(ul);

    };

    $.widget("custom.zonecomplete", $.ui.autocomplete, {
        _renderMenu: function (ul, items) {
            var that = this,
                currentZona = "";
            $.each(items, function (index, item) {
                if (item.zona != currentZona) {
                    ul.append("<li class='ui-autocomplete-barrio'>" + item.zona + "</li>");
                    currentZona = item.zona;

                }
                that._renderItemData(ul, item);

            });
        }
    });

    $(function () {
        $("#barrio").zonecomplete({
            delay: 0,
            source: function (request, response) {
                $.get($("#menuZona").data("url"),{
                    q: request.term
                }, function (data) {
                    response($.map(data,function (item){
                        return { value: item.id, label: item.name,
                            zona: item.zona, zonaId: item.zonaId };
                    }));
                });
            },

            focus: function (event, ui) {
                $("#barrio").val(ui.item.label);
                return false;
            },
            select: function (event, ui) {
                $("#barrio").val(ui.item.label);
                $("#barrio-id").val(ui.item.value);
                $("#zona-id").val(ui.item.zonaId);
                return false;
            }
        });
    });

   var datos = {'day':day,'time':time};
   var jqxTiendasPremium = $.getJSON( $("#sugeridos").data("url"),datos)
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
										element +='			<a href="'+data[index].link+'" class="btn btn-warning go_tienda"></i>Ir a la tienda</a>';
										element +='		</div> ';
										element +='<img src="'+data[index].promo+'" title="'+data[index].title +'" class="new">';
										//element +='<img src="'+data[index].open+'" class="open">';
										element += '</div>';
										                        element +='    <div class="choose">';
    									  element +='       <ul class="nav nav-pills nav-justified">';
    										element +='         <li><a href="javascript:void(0)" class="horarios_modal" data-texto="'+h+'"><i class="fa fa-clock-o"></i>Consultar horario</a>  </li>';
                    if (data[index].favorito == true){    
                        element +='         <li><a href="javascript:void(0)" class="add_favorito" data-sucursal="'+data[index].id+'"><i class="fa fa-heart"></i></a></li>';
                     }   
                    else{
                        element +='         <li><a href="javascript:void(0)" class="add_favorito" data-sucursal="'+data[index].id+'"><i class="fa fa-plus-square"></i>Agregar a Favoritos</a></li>';                    
                    }    
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
                  console.log("hola");
              })
              .fail(function() {
                console.log( "can't load tiendas premium" );
              });
              
              
      //LOGIN
     $("#btnLogin").popover({
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
             var self = $(this);
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
                    self.html('<i class="fa fa-plus-square"></i>Agregar a Favoritos</a>');     
                 }else{  
                    self.html('<i class="fa fa-heart"></i>');
                 } 
              
              }).fail(function(data){
                 
                 alert("No se pudo agregar como favorito");
              });
      
      });

      $("body").on("click","#buscar",function() {

          var ubicacion;

          if($('#barrio-id').val() != 0){

              var zona = $('#zona-id').val();
              ubicacion = { 'barrioId': $('#barrio-id').val(),'zonaId': zona }

          }else if (isSet($.cookie('delivery-ubicacion'))){

              ubicacion = JSON.parse($.cookie('delivery-ubicacion'));

          }else{

              ubicacion = {'zonaId': 147};  // por defecto carga los que son CABA
          }

          $('#title_mira').hide();
          $('#tiendas_listado').text(" ");

          getTiendas(ubicacion);

      });
      
});


function getTiendas(ubicacion){

	var day = moment().weekday();
	var time = moment().format('HH:mm');
    var cat = $('#categoria-id').val();
	console.log("en getTiendas"+day+"time"+time+"cat"+cat);
    //var dataString = 'zona=' + zonas[1]+"&barrio="+zonas[0];

	var data = "zona="+ubicacion.zonaId+"&barrio="+ubicacion.barrioId+"&day="+day+"&time="+time+"&cat="+cat;
      $.ajax({
            type: "POST",
            url: $("#tiendas_listado").data("url"),
            dataType: 'json',
            data: data, //ubicacion,day,time
       })
              .done(function(data) {
				  var h="";

                if(data){

                    $('#tiendas_listado').show();
                    $('#title_mira').show();

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
                      	element += '										<a href="'+data[index].link+'" class="btn btn-warning go_tienda"  data-sucursal="'+data[index].id+'"></i>Ir a la tienda</a>';
                      	element += '									</div> ';
                        element +='<img src="'+data[index].promo+'" title="'+data[index].title +'" class="new">';
										//element +='<img src="'+data[index].open+'" class="open">';
										element += '</div>';
                      	element += '							</div>';
                        element +='    <div class="choose">';
                        element +='       <ul class="nav nav-pills nav-justified">';
                        element +='         <li><a href="javascript:void(0)" class="horarios_modal" data-texto="'+h+'"  ><i class="fa fa-clock-o"></i>Consultar horario</a>  </li>';
                        if (data[index].favorito == true){  
                            element +='         <li><a href="javascript:void(0)" class="add_favorito" data-sucursal="'+data[index].id+'"><i class="fa fa-heart"></i></a></li>';
                        }else{
                            element +='         <li><a href="javascript:void(0)" class="add_favorito" data-sucursal="'+data[index].id+'"><i class="fa fa-plus-square"></i>Agregar a Favoritos</a></li>';
                        }

                        element +=' 			</ul>';
    								    element +='    </div>';
                      	element += '						</div>';
                      	element += '					</div>';
                                                                                                       
                    
                    $('#tiendas_listado').append(element);
                       
                  });
                }else{
                    var respuesta = '<p class="respuesta">No hay tiendas cerca</p>';
                    $('#tiendas_listado').append(respuesta);
                }
              })
              .fail(function() {
                console.log( "can't load tiendas" );
              });        
}
