<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$Categoria = (isset($_POST['Categoria'])) ? $_POST['Categoria'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
        $consulta= "INSERT INTO user (nombre, email, telefono, password, Categoria) VALUES('$nombre', '$email', '$telefono', '$password', '$Categoria')";

        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, nombre, email, telefono, password, Categoria FROM user ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta= "UPDATE user SET nombre='$nombre', email='$email', telefono='$telefono', password='$password', Categoria='$Categoria' WHERE id='$id'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();   
            
        $consulta = "SELECT id, nombre, email, telefono, password, Categoria FROM user WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM user WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
