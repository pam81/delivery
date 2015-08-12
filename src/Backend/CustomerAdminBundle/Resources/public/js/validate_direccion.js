$(document).ready(function() {
		var validator = $("#tab").validate({
		
			rules: {                 
				"backend_customeradminbundle_direccion[calle]": {
					required:true,
					minlength:2,
					maxlength:100,
				}
			},
			
			 messages: {
            "backend_customeradminbundle_direccion[calle]": {
            required: "Ingrese el nombre de la calle",
            maxlength: jQuery.format("Máximo {0} carácteres!"),
            minlength: jQuery.format("Mínimo {0} carácteres!")
            },
      },
      
      errorPlacement: function(error, element) {
             
            	error.appendTo( element.next() );
        }
			
		});
		
	});





