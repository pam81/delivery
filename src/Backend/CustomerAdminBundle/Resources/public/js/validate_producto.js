$(document).ready(function() {

   

$("#backend_customeradminbundle_producto_categoria").change(function() {
    var option = $("#backend_customeradminbundle_producto_categoria option:selected").val();
    
    limpiarSelect("backend_customeradminbundle_producto_subcategoria");
  
    if (option !== '')
    {
        var dataString = 'categoria=' + option;
        var path = $(this).data('url');
        $.ajax({
            type: "POST",
            url: path,
            dataType: 'json',
            data: dataString,
            success: function(data) {
                $('#backend_customeradminbundle_producto_subcategoria').select2({data: data});
            }
        });
    }
});


		var validator = $("#tab").validate({
		
			rules: {                 
				"backend_customeradminbundle_producto[name]": {
					required:true,
					minlength:2,
					maxlength:200,
				},
        "backend_customeradminbundle_producto[sucursales]": {
					required:true,
					
				},
        "backend_customeradminbundle_producto[categoria]": {
					required:true,
					
				},
        "backend_customeradminbundle_producto[subcategoria]": {
					required:false,
					
				},
        "backend_customeradminbundle_producto[precio]": {
					required:true,
					maxlength:100,
          number: true
				},
        "backend_customeradminbundle_producto[description]": {
					required:false,
					maxlength:500,
				},
        "backend_customeradminbundle_producto[code]": {
					required:false,
					maxlength:100,
				},
        "backend_customeradminbundle_producto[variedades]": {
					required:false,
					
				},
        "backend_customeradminbundle_producto[isActive]": {
					required:false,
					
				},
        "backend_customeradminbundle_producto[alwaysAvailable]": {
					required:false,
					
				},
        "backend_customeradminbundle_producto[maxVariedad]": {
					required:false,
					digit: true
				},
        "backend_customeradminbundle_producto[minVariedad]": {
					required:false,
					digit: true
				},
			},
			
			 messages: {
            "backend_customeradminbundle_producto[name]": {
            required: "Ingrese el nombre del producto",
            maxlength: jQuery.validator.format("Máximo {0} carácteres!"),
            minlength: jQuery.validator.format("Mínimo {0} carácteres!")
            },
            "backend_customeradminbundle_producto[precio]": {
            required: "Ingrese un precio para el producto",
            maxlength: jQuery.validator.format("Máximo {0} carácteres!"),
            number: "Ingreser un valor por ejemplo 1.99"
            },
            "backend_customeradminbundle_producto[sucursales]": {
            required: "Seleccione al menos una sucursal",
            
            },
            "backend_customeradminbundle_producto[categoria]": {
            required: "Seleccione Categoría",
            
            },
            "backend_customeradminbundle_producto[subcategoria]": {
            required: "Seleccione subcategoría",
            
            },
            "backend_customeradminbundle_producto[code]": {
            maxlength: jQuery.validator.format("Máximo {0} carácteres!"),
            
            },
            "backend_customeradminbundle_producto[description]": {
            maxlength: jQuery.validator.format("Máximo {0} carácteres!"),
            
            },
            "backend_customeradminbundle_producto[maxVariedad]": {
            numeric: "Debe ingresar un número",
            
            },
            "backend_customeradminbundle_producto[minVariedad]": {
           numeric: "Debe ingresar un número",
            
            },
            
      },
      
      errorPlacement: function(error, element) {
             
            	error.appendTo( element.next() );
        }
			
		});
		
	});





