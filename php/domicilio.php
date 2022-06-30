<?php
 session_start();
 $id= $_SESSION ["usera"];
                  $link = new mysqli("localhost","root","","bdd");

		  $direccion = $_POST['direccion'];
    
                 
  function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
                     }
 
                 $factura = generarCodigo(6);

  
                
    
     $resss = mysqli_query($link, "UPDATE compras SET factura= '$factura' WHERE id_usuario= '$id' and factura = '' ");
     $res = mysqli_query($link, "UPDATE compras SET direccion= '$direccion' WHERE id_usuario= '$id'");

$resss = mysqli_query($link, "UPDATE compras SET factura= '$factura' WHERE id_usuario= '$id' and factura = '' ");
    
    $re="select * from compras where id_usuario =  '$id' " ;
                   $ree=$link ->query($re);
		     while($t=$ree->fetch_assoc() ) {
                
                 $id_cat = $t['id_cat'];
                        $id_compra= $t['id_compra'];
                        $id_user = $_SESSION ['usera'];
                        $id_pro = $t['id_producto'];
                        $produc =  $t['producto'];
                        $precio =  $t['precio'];
                        $imagen =  $t['imagen'];
                        $id_cat = $t['id_cat'];
                        $cant = $t['cantidad'];
                        $fact = $t['factura'];
                        $direccion = $t['direccion'];
                         
    $res = mysqli_query($link,"insert into ventas values ('','$id_compra','$id_pro','$id_user','$produc','$cant','$precio','$imagen','$id_cat','$fact','$direccion' )"); 
             }

      $del = mysqli_query($link,"delete from compras where id_usuario='$id'");

                
                   echo  "<script>alert('Gracias por su compra, SU FACTURA ES: es $factura'); window.location.href='../html/index.php'</script>" ;
                 

    
   

	



	?>