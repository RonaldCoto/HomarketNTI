<?php

    include './consumeServices.php';

    $array_usuario = array(
        'nombre' => $_POST['nombreusuario'],
        'email' => $_POST['emailusuario'],
        'telefono' => (int) $_POST['telefono'],
        'password' => $_POST['passusuario'],
        'categoria' => 'C'
    );

    //$nom = $_POST['nombreusuario'];
    $email = $_POST['emailusuario'];
    //$tel = $_POST['telefono'];
    $pass = $_POST['passusuario'];
    $pass2 = $_POST['rpassusuario'];
    //$img = $_FILE['imagen'];

    $link = mysqli_connect("localhost","root","","bdd");

    if ($pass != $pass2){

        echo "las contraseñas no coinciden";

    }else{

	    $consulta="SELECT email from  user where email ='$email'";
        $re=$link ->query($consulta);
        $fil= mysqli_fetch_array($re);
        
        if ( $fil != "" ){
            echo "<script>alert('El correo electronico ingresado ya existe, ingrese uno nuevo '); window.location.href='../html/inicio_sesion.php'</script>"; 
        }else{

            $te=getWithParamethers("http://localhost:90/v1/user/signup", $array_usuario, 2);

            if($te){
                echo "<script>alert('Registro exitoso! '); window.location.href='../html/login.php'</script>"; 
            }else{
                echo "No se realizo con exito la conexion";
            }

            //$insertar="INSERT INTO `user` (`nombre`, `email`, `telefono`, `password`,`Categoria`) VALUES ('$nom', '$email', '$tel', '$pass','C')";
			//$resultado=mysqli_query($link,$insertar);
			
            /*if(!$resultado){
				echo "No se realizo con exito la conexion";
			}else{
                echo "<script>alert('Registro exitoso! '); window.location.href='../html/login.php'</script>"; 
			}*/
        }
    }
?>