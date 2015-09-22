$(document).ready(function() {
		var validator = $("#tab").validate({
		
			rules: {                 
				"backend_customeradminbundle_sucursaltype[name]": {
					required:true,
					minlength:2,
					maxlength:100,
				}
				"backend_customeradminbundle_sucursaltype[cuit]": {
					required:true,
					numeric:true,
					minlength:11,
					maxlength:20,
				}
				"backend_customeradminbundle_sucursaltype[phone]": {
					required:true,
					minlength:8,
					maxlength:20,
				}
			},
			
		    messages: {
            "backend_customeradminbundle_sucursaltype[name]": {
            required: "Ingrese el nombre de la sucursal",
            maxlength: jQuery.format("Máximo {0} carácteres!"),
            minlength: jQuery.format("Mínimo {0} carácteres!")
            },
		 	messages: {
           "backend_customeradminbundle_sucursaltype[cuit]": {
           required: "Ingrese el numero de cuit",
		   numeric: "Ingrese los numeros sin guiones",	   
           maxlength: jQuery.format("Máximo {0} carácteres!"),
           minlength: jQuery.format("Mínimo {0} carácteres!")
           },
		 	messages: {
           "backend_customeradminbundle_sucursaltype[telefono]": {
           required: "Ingrese el numero de telefono",
           maxlength: jQuery.format("Máximo {0} carácteres!"),
           minlength: jQuery.format("Mínimo {0} carácteres!")
           },
      },
      
      errorPlacement: function(error, element) {
             
            	error.appendTo( element.next() );
        }
			
		});
		
	});





