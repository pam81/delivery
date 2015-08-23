$('#asociarHorario').on("click",function(){	
	
	var path=$(this).data("url");
	console.log(path);
	var dataString = "";
	
$.ajax({
			  type: "POST",
			  url: path,
			  dataType: 'json',
			  data: dataString,
		})
		.done(function(data){
								
			if (data.existe){
			  $('#horarios').show();
			  alert("hola");
			  /*
			  html = '<table class="table"><tr><th></th><th>Dia</th><th>Desde</th><th>Hasta</th><th>Cerrado</th></tr>';
			  $.each(data.resultados, function(i, item) {
				  var f = JSON.stringify(item.formula);
				  html += '<tr><td><input type="radio" value ='+JSON.parse(f)+' class="form_check" name="form" data-n="'+item.name+'">'+'</td><td>'+item.name+'"</td><td><input type="text" id="desde_'+item.id+'<td>'+item.name+'</td><td></td><td>'+item.name+'</td><td><input type="radio" value ="1"</td></tr>';
			   });
			  html+= '</table'>
			  
			  $('#horarios').append(html);
			  
			  $('.form_check').on("change",function(){
				
					if($(this).is(':checked')){ 
						
						$('#backend_adminbundle_parametro_formula').prop('value',$(this).val());	
																	
					}
			  });	
				
			  }else{
				
				alert("se ha producido un error");				
			}*/
		  }
		}); 

});
