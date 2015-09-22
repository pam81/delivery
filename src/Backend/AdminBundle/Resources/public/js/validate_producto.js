$(document).ready(function() {

   

$("#backend_adminbundle_producto_categoria").change(function() {
    var option = $("#backend_adminbundle_producto_categoria option:selected").val();
    
    limpiarSelect("backend_adminbundle_producto_subcategoria");
  
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
                $('#backend_adminbundle_producto_subcategoria').select2({data: data});
            }
        });
    }
});


		var validator = $("#tab").validate({
		
			rules: {                 
				"backend_adminbundle_producto[name]": {
					required:true,
					minlength:2,
					maxlength:200,
				}
			},
			
			 messages: {
            "backend_adminbundle_producto[name]": {
            required: "Ingrese el nombre del producto",
            maxlength: jQuery.validator.format("Máximo {0} carácteres!"),
            minlength: jQuery.validator.format("Mínimo {0} carácteres!")
            },
      },
      
      errorPlacement: function(error, element) {
             
            	error.appendTo( element.next() );
        }
			
		});
		
	});





