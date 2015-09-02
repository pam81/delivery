$('#nuevo').on("click",function(){	
	
	var path = $(this).data("url");
	console.log(path);
	var dataString = "";
	//var guardar = '<button type="button" class="btn btn-primary" id="guardar" data-url="{{ path(\'sucursal\') }}" >Guardar</button>';	
	
	var ejemplo = "vamos a agregar texto";
	
	$('#horarios').append(ejemplo);
/*	
$.ajax({
			  type: "POST",
			  url: path,
			  dataType: 'json',
			  data: dataString,
		})
		.done(function(data){
								
			if (data.existe){
			  //$('#asociarHorario').hide();	
			  $('#horarios').show();
			  
			  html = '<table class="table"><tr><th></th><th>Dia</th><th>Desde</th><th>Hasta</th><th align="center">Cerrado</th></tr>';
			  $.each(data.resultados, function(i, item) {
				  html += '<tr><td><input type="checkbox" value ="'+item.id+'" class="check_dia" id="dia_'+item.id+'" data-id="'+item.id+'">'+'</td><td>'+item.name+'</td><td><input type="text" id="desde_'+item.id+'"></td><td><input type="text" id="hasta_'+item.id+'"></td><td align="left"><input type="checkbox" id="close_'+item.id+'"></td></tr>';
			   });
			   html+= '</table'>
			  
			   
			   $('#horarios').append(html);
			   //$('#horarios').append(guardar);
			   $('#guardar').show();
			  /*
			  $('.form_check').on("change",function(){
				
					if($(this).is(':checked')){ 
						
						$('#backend_adminbundle_parametro_formula').prop('value',$(this).val());	
																	
					}
			  });	
				*/
/*
			  }else{
				
				alert("se ha producido un error");				
			}
		  
		}); 
*/
});



$('#guardar').on("click",function(){	
	
	var path=$(this).data("url");
	console.log(path);
	
	var dias = new Array();
	var cerrado = false;
	var horarios; 
	
	$('.check_dia').each(function(){
		
		if($(this).prop('checked')){
		
			var d = $(this).val();
		
			var desde = $('#desde_'+d).val();
		
			var hasta = $('#hasta_'+d).val(); 	
			
			if($('#close_'+d).prop('checked')){
		
				cerrado = true;
			
			}else{
				
				cerrado = false;
			}	
			
			console.log("dia:"+d+",desde:"+desde+"hasta:"+hasta+"cerrado:"+cerrado);
		
			/*if(id == " " && desde == " " && !($('#close_'+id).is('checked'))){
			
				console.log('debe al menos completar un campo');
		
			}else{
			*/
				var dia = {d: d ,de:desde, ha:hasta, ce:cerrado};
			
				console.log(dia);
			
		   	 	dias.push(dia);
			
				horarios = JSON.stringify(dias);
			
				console.log(horarios);
			
		//	}
				
		}	
		
	});
	
	
$.ajax({
         type: "POST",
 		 url: path,
         dataType: 'json',
		 data: horarios 
	
		})
		.done(function(data){
								
			   if(!data.ok){
								
					alert("Error al guardar el horario");			
							  
			   }else{			 
			    alert("El horario se ha guardado correctamente");
					//$("#volver").click();
			   } 
		 });


}); 
		
		
	
	