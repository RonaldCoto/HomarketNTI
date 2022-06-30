<?php
$link = new mysqli("localhost","root","","bdd");

$nom = $_POST['nombre'];
$pre = $_POST['precio'];
$cant = $_POST['cantidad'];
$cat = $_POST['categoria'];
$sub_cat = $_POST['subcategoria'];

	$target_path = "../img/";
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
	} else{
	echo "Ha ocurrido un error, trate de nuevo!";
	} 
	$img  = $_FILES['uploadedfile']['name'];

	$reg = mysqli_query($link, " INSERT into productos  values ('','$nom','$pre','$cant','$img','$cat','$sub_cat')") ;
 
        echo "<script>alert('Producto ingresado'); window.location.href='../../administrador.php'</script>"; 

	



	

?>