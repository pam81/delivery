 $("#btnCarrito").popover({
          html: true, 
	       content: function() {
          return $('#carrito-content').html();
        }
      }); 