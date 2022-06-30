$(document).ready(function(){
    tablaUser = $("#tablaUser").DataTable({
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
    $("#formUser").trigger("reset");
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
    email = fila.find('td:eq(2)').text();
    telefono = parseInt(fila.find('td:eq(3)').text());
    password = fila.find('td:eq(4)').text();
    Categoria = fila.find('td:eq(5)').text();

    $("#nombre").val(nombre);
    $("#email").val(email);
    $("#telefono").val(telefono);
    $("#password").val(password);
    $("#Categoria").val(Categoria);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar registro");            
    $("#modalCRUD").modal("show");  
    
});

function actualizar(){
    window.location.replace("index.php");
}
//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaUser.row(fila.parents('tr')).remove().draw();
            }
        });
        actualizar();
    }   
});
    
$("#formUser").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    email = $.trim($("#email").val());
    telefono = $.trim($("#telefono").val());
    password = $.trim($("#password").val());
    Categoria = $.trim($("#Categoria").val());   
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, email:email, telefono:telefono, password:password, Categoria:Categoria, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombre = data[0].nombre;
            email = data[0].email;
            telefono = data[0].telefono;
            password = data[0].password;
            Categoria = data[0].Categoria;
            if(opcion == 1){tablaUser.row.add([id,nombre,email,telefono,password,Categoria]).draw();}
            else{tablaUser.row(fila).data([id,nombre,email,telefono,password,Categoria]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});