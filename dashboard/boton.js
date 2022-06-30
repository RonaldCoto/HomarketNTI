$(document).on("click", ".btnEditar", function(){
   
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar registro");            
    $("#modalCRUD").modal("show");  
    
});

$("#formProductos").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    precio = $.trim($("#precio").val());
    existencia = $.trim($("#existencia").val());
    imagen = $.trim($("#imagen").val());
    id_categoria = $.trim($("#id_categoria").val());
    id_subcategoria = $.trim($("#id_subcategoria").val()); 
    imagen=imagen.replace("C:\\fakepath\\", ""); 
    $.ajax({
        url: "bd/crud2.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, precio:precio, existencia:existencia, imagen:imagen, id_categoria:id_categoria, id_subcategoria:id_subcategoria, id:id, opcion:2},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombre = data[0].nombre;
            precio = data[0].precio;
            existencia = data[0].existencia;
            imagen = data[0].imagen;
            id_categoria = data[0].id_categoria;
            id_subcategoria = data[0].id_subcategoria;
            if(opcion == 1){tablaProductos.row.add([id,nombre,precio,existencia,imagen,id_categoria,id_subcategoria]).draw();}
            else{tablaProductos.row(fila).data([id,nombre,precio,existencia,imagen,id_categoria,id_subcategoria]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    actualizar();
});    

function actualizar(){
     window.location.replace("buttons.php");
}