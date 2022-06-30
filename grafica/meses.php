<?php
	
 $cod = $_POST['Codigo'];
    $cantidad = $_POST['Cantidad'];
    $fecha_actual=date("Y/m/d");



	$conecte= new mysqli("localhost","root","","proyecto");
$consult = "select cantidadarticulo from articulos where codarticulo ='".$cod."'";
$resul = $conecte->query($consult);
         $fil = $resul->fetch_assoc();
$cant=$fil['cantidadarticulo'];


if ($cant == 0){
    echo"<script>alert('No hay productos en existencia'); window.location.href=\"../php/RegistrarVenta.php\"</script>";
    
}else if($cant < $cantidad){
   
      echo"<script>alert('La cantidad a vender es mayor a la de existencia');window.location.href=\"../php/RegistrarVenta.php\"</script>";
    
}else{
    

 $consulta4 = "select cantidadarticulo FROM articulos WHERE codarticulo='".$cod."'";
$result4 = $conecte->query($consulta4);
         $fila4 = $result4->fetch_assoc();
$cantt=$fila4['cantidadarticulo'];

$canttt = $cantt-$cantidad;

        $consulta5 = "UPDATE articulos set cantidadarticulo='".$canttt."' WHERE codarticulo='".$cod."'";
$result5 = $conecte->query($consulta5);
    
$consulta1 = "select nombre from articulos where codarticulo ='".$cod."'";
$result1 = $conecte->query($consulta1);
         $fila1 = $result1->fetch_assoc();
$nombre=$fila1['nombre'];

 $consulta2 = "select precioVenta from articulos where codarticulo = '".$cod."' ";
$result2 = $conecte->query($consulta2);
         $fila2 = $result2->fetch_assoc();
$suman=$fila2['precioVenta'];


$total = $cantidad*$suman;

$consulta = "INSERT INTO ventas VALUES ('','".$nombre."','".$cantidad."','".$total."','".$fecha_actual."','".$cod."')";
$result = $conecte->query($consulta);
        echo"<script>alert('Agregado exitosamente'); window.location.href=\"../php/RegistrarVenta.php\"</script>";
        
}
	

?>