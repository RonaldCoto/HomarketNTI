<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';
$existencia = (isset($_POST['existencia'])) ? $_POST['existencia'] : '';
$imagen = (isset($_POST['imagen'])) ? $_POST['imagen'] : '';
$id_categoria = (isset($_POST['id_categoria'])) ? $_POST['id_categoria'] : '';
$id_subcategoria = (isset($_POST['id_subcategoria'])) ? $_POST['id_subcategoria'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';




switch($opcion){
    case 1: //alta
        
        $consulta= "INSERT INTO productos (nombre, precio, existencia, imagen, id_categoria, id_subcategoria) VALUES('$nombre', '$precio', '$existencia', '$imagen', '$id_categoria', '$id_subcategoria')";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, nombre, precio, existencia, imagen, id_categoria, id_subcategoria FROM productos ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta= "UPDATE productos SET nombre='$nombre', precio='$precio', existencia='$existencia', imagen='$imagen', id_categoria='$id_categoria', id_subcategoria='$id_subcategoria' WHERE id='$id'";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, nombre, precio, existencia, imagen, id_categoria, id_subcategoria FROM productos WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM productos WHERE id='$id' ";     
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
