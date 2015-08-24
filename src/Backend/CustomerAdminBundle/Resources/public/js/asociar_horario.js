$('#asociarHorario').on("click",function(){	
	
	var path=$(this).data("url");
	console.log(path);
	var dataString = "";
	var guardar = '<button type="button" class="btn btn-primary" style="align:right;" >Guardar</button>';
	
$.ajax({
			  type: "POST",
			  url: path,
			  dataType: 'json',
			  data: dataString,
		})
		.done(function(data){
								
			if (data.existe){
			  $('#asociarHorario').hide();	
			  $('#horarios').show();
			  
			  html = '<table class="table"><tr><th></th><th>Dia</th><th>Desde</th><th>Hasta</th><th align="center">Cerrado</th></tr>';
			  $.each(data.resultados, function(i, item) {
				  html += '<tr><td><input type="checkbox" value ="dia_'+item.id+'">'+'</td><td>'+item.name+'</td><td><input type="text" id="desde_'+item.id+'"></td><td><input type="text" id="hasta_'+item.id+'"></td><td align="left"><input type="checkbox"></td></tr>';
			   });
			   html+= '</table'>
			  
			   $('#horarios').append(html);
			   $('#horarios').append(guardar);
			   
			  /*
			  $('.form_check').on("change",function(){
				
					if($(this).is(':checked')){ 
						
						$('#backend_adminbundle_parametro_formula').prop('value',$(this).val());	
																	
					}
			  });	
				*/
			  }else{
				
				alert("se ha producido un error");				
			}
		  
		}); 

});

//$('#guardar').on(click,function)