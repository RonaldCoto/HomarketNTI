<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "bdd";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM productos ";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM productos WHERE nombre LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					
    					<td>Nombre</td>
    					<td>Precio</td>
    					<td>Existencia</td>
    
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    				
    					<td>".$fila['nombre']."</td>
    					<td>".$fila['precio']."</td>
    					<td>".$fila['existencia']."</td>
    				

    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS QUE COINCIDAN";
    }


    echo $salida;

    $conn->close();



?>