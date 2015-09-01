$(document).ready(function() {
		var validator = $("#tab").validate({
		
			rules: {                 
				"backend_customeradminbundle_direccion[calle]": {
					required:true,
					minlength:2,
					maxlength:100,
				},
				"backend_customeradminbundle_direccion[numero]": {
					required:true,
					numeric:true,
					minlength:2,
					maxlength:10,
				},
				"backend_customeradminbundle_direccion[zip]": {
					required:true,
					minlength:4,
					maxlength:10,
				}
			},
			
			messages: {
            "backend_customeradminbundle_direccion[calle]": {
            required: "Ingrese el nombre de la calle",
            maxlength: jQuery.format("Máximo {0} carácteres!"),
            minlength: jQuery.format("Mínimo {0} carácteres!")
            },
            "backend_customeradminbundle_direccion[numero]": {
            required: "Ingrese un numero para la direccion",
            maxlength: jQuery.format("Máximo {0} carácteres!"),
            minlength: jQuery.format("Mínimo {0} carácteres!")
            },
            "backend_customeradminbundle_direccion[zip]": {
            required: "Ingrese el codigo postal",
            maxlength: jQuery.format("Máximo {0} carácteres!"),
            minlength: jQuery.format("Mínimo {0} carácteres!")
            },
			
				
      },
      
      errorPlacement: function(error, element) {
             
            	error.appendTo( element.next() );
        }
			
		});
		
	});





