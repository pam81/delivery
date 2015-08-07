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
  
});
