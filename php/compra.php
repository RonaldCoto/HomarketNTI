 <?php
        session_start();
        
        
            $link = new mysqli("localhost","root","","bdd");
           $consulta="SELECT nombre from  user where id ='".$_SESSION ["usera"]."' ";
          $re=$link ->query($consulta);
            $fil=$re->fetch_assoc();
            ?>
<?php
        
                  $link = new mysqli("localhost","root","","bdd");

if (isset($_POST['codigo'])) {
		$id =$_POST['codigo'];
    $re="select * from productos where id =  '$id' " ;
                   $ree=$link ->query($re);
		     while($t=$ree->fetch_assoc() ) {
                        $id_pro = $t['id'];
                 $id_cat =   $t['id_categoria'];
                        $id_user = $_SESSION ['usera'];
                        $produc =  $t['nombre'];
                        $precio =  $t['precio'];
                        $imagen =  $t['imagen'];
                        $cant = $_POST['cantidad'];
                         
    $res = mysqli_query($link,"insert into compras values ('','$id_pro','$id_user','$produc','$cant','$precio','$imagen','$id_cat','','' )");
                 $ress = mysqli_query($link, "UPDATE productos SET existencia = existencia - '$cant' WHERE id='$id'");
                }
    echo "<script>alert('Producto agregado al carrito');  history.go(-1); </script>"; 
    
    
	}else if (isset($_POST['codigo2'])) {
                $link = new mysqli("localhost","root","","bdd");
                $id =$_POST['codigo2'];
                $cant = $_POST['cantidad'];
    
           $re="SELECT * from compras where id_compra ='$id' ";
    
            $ree=$link ->query($re);
		     while($t=$ree->fetch_assoc() ) {
                        $id_prod = $t['id_producto']; 
    $ress = mysqli_query($link, "UPDATE productos SET existencia = existencia + '$cant' WHERE id='$id_prod'");

    $res = mysqli_query($link,"delete from compras where id_compra = '$id'" );

                }
    
    
                 echo "<script>alert('Compra cancelada'); window.location.href='../html/carrito.php'</script>";
                     }


	



	?>

