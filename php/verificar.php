<?php
    
     	$link = mysqli_connect("localhost","root","","bdd");

          $consulta = "SELECT id from user where nombre =  '".$_POST["nombre"]."'";
     
         $myusuario = $link->query($consulta);

     $nmyusuario = mysqli_num_rows($myusuario);

     
     if($nmyusuario != 0){
          $csql = "SELECT id from user where nombre = '".$_POST["nombre"]."' and password = '".$_POST["passw"]."'";
          $myclave = $link->query($csql);
          $nmyclave = mysqli_num_rows($myclave);
          $idusr= mysqli_fetch_array($myclave);
          $nombre = $nmyclave;
          $csql = "SELECT nombre from user where nombre = '".$_POST["nombre"]."' and password = '".$_POST["passw"]."'";
          $jk=$link->query($csql);
          $id=mysqli_fetch_array($jk);
         
         $sql2 = "SELECT categoria from user where nombre = '".$_POST["nombre"]."' and password = '".$_POST["passw"]."'";
           $jk2=$link->query($sql2);
          $cat=mysqli_fetch_array($jk2);
         
          if($nmyclave != 0){
               session_start();
              
               $_SESSION["autentica"] = "SIP";
               $_SESSION["usera"] = $idusr['id']; 
               $_SESSION["comparar"]= $nombre;
               $_SESSION ["id"]=$id[0];
               $_SESSION["categoria"]=$cat[0];
              if ($_SESSION["categoria"] == 'A'){
                header ("Location: ../dashboard/index.php");
              }elseif ($_SESSION["categoria"] == 'W') {
                header ("Location: ../WEB SERVICE/index.php");
              }else{
                header ("Location: ../html/index.php");
              
              }
          }else{
                       echo "<script>alert('Usuario o contraseña incorrecta'); window.location.href='../html/login.php'</script>"; 

          } 
     }else{
          echo "<script>alert('¡UPS! has sido banneado o la cuenta no existe'); window.location.href='../html/login.php'</script>"; 

     }

          
     mysqli_close($link);


?>
