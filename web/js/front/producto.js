$(document).ready(function(){

   simpleCart.bind( 'ready' , function(){
      loadCantidad();
  });
/*
   $('#buscar').on('click',function(){

           buscarNuevo();
    });
*/
});

function loadCantidad(){

//si el producto que muestro de la tienda esta en el 
   //carrito le cargo la cantidad que esta comprando
   simpleCart.each( function( item ){
      var id= item.get("product_id");
     if ( $("#input-producto-"+id) ){
          $("#input-producto-"+id).val(item.quantity());
     }
   
   
   });

}

function buscarNuevo(){

    var data = "filter="+$('#filtro').val();
    alert(data);
    $.ajax({
        type: "POST",
        url: $("#buscar").data("url"),
        dataType: 'json',
        data: data, //ubicacion,day,time
    })
        .done(function(data) {

            if(data){

                $('#productos').text(" ");

                $.each(data,function(index){

                    var element = '<div class="col-md-3 col-sm-6 hero-feature">';
                    element += '		<div class="thumbnail">';
                    element += '			<img src="'+data[index].imagen+'" alt="'+data[index].nombre+'">';
                    element += '			<div class="caption">';
                    element += '				<p class="product-title">'+data[index].nombre+'</p>';
                    element += '				<p class="product-desc">'+data[index].descripcion+'</p>';
                    element += '                <p class="product-title">$'+data[index].precio+'</p>';
                    element += '    <p class="product-desc"><a href="#">Ver variedades</a></p>';
                    element += '		    </div> ';
                    element +='<img src="'+data[index].promo+'" title="'+data[index].title +'" class="new">';
                    //element +='<img src="'+data[index].open+'" class="open">';
                    element += '</div>';
                    element += '							</div>';
                    element +='    <div class="choose">';
                    element +='       <ul class="nav nav-pills nav-justified">';
                    element +='         <li><a href="javascript:void(0)" class="horarios_modal" data-texto="'+h+'"  ><i class="fa fa-clock-o"></i>Consultar horario</a>  </li>';
                    if (data[index].favorito == true){
                        element +='         <li><a href="javascript:void(0)" class="add_favorito" data-sucursal="'+data[index].id+'"><i class="fa fa-heart"></i></a></li>';
                    }else{
                        element +='         <li><a href="javascript:void(0)" class="add_favorito" data-sucursal="'+data[index].id+'"><i class="fa fa-plus-square"></i>Agregar a Favoritos</a></li>';
                    }

                    element +=' 			</ul>';
                    element +='    </div>';
                    element += '						</div>';
                    element += '					</div>';


                    $('#tiendas_listado').append(element);

                });
            }else{
                var respuesta = '<p class="respuesta">No hay productos disponibles</p>';
                $('#productos').append(respuesta);

            }
        })
        .fail(function() {
            console.log( "can't load productos" );
        });





}