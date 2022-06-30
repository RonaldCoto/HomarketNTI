$(document).ready(function(){
    tablaProductos = $("#tablaProductos").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formProductos").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo registro");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    precio = parseFloat(fila.find('td:eq(2)').text());
    existencia = parseInt(fila.find('td:eq(3)').text());
    imagen = fila.find('td:eq(4)').text();
    id_categoria = parseInt(fila.find('td:eq(5)').text());
    id_subcategoria = parseInt(fila.find('td:eq(6)').text());

    $("#nombre").val(nombre);
    $("#precio").val(precio);
    $("#existencia").val(existencia);
    $("#imagen").val(imagen);
    $("#id_categoria").val(id_categoria);
    $("#id_subcategoria").val(id_subcategoria);

    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar registro");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud2.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaProductos.row(fila.parents('tr')).remove().draw();
            }
        });
        actualizar();
    }   
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
        data: {nombre:nombre, precio:precio, existencia:existencia, imagen:imagen, id_categoria:id_categoria, id_subcategoria:id_subcategoria, id:id, opcion:opcion},
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
    
});    
    
});

function actualizar(){
     window.location.replace("buttons.php");
}