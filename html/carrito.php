<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Homarket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">

			    </div>
		    </div>
		  </div>
    </div>
    <?php
        session_start();
        
        if (isset($_SESSION["usera"] )){
            $link = new mysqli("localhost","root","","bdd");
           $consulta="SELECT nombre from  user where id ='".$_SESSION ["usera"]."' ";
          $re=$link ->query($consulta);
            $fil=$re->fetch_assoc();

    echo '<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="index.php">HOMARKET</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORIAS</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="sub-electro.php">Electrodomesticos</a>
                <a class="dropdown-item" href="sub-bebe.php">Bebés</a>
                <a class="dropdown-item" href="sub-electronicos.php">Electrónicos</a>
                <a class="dropdown-item" href="sub-salud.php">Salud</a>
                <a class="dropdown-item" href="sub-juegos.php">Juguetes</a>
                <a class="dropdown-item" href="carnes.php">Carnes</a>
                <a class="dropdown-item" href="sub-bebidas.php">Bebidas</a>
                <a class="dropdown-item" href="sub-limpieza.php">Limpieza y hogar</a>
                <a class="dropdown-item" href="sub-escuela.php">Zona Escolar</a>
                <a class="dropdown-item" href="sub-bakery.php">Bakery</a>
              </div>
            </li>
              <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
              
              <li class="nav-item cta cta-colored"><a href="./carrito.php" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
              <li class="nav-item"><a href="../php/destroy.php" class="nav-link">Cerrar Sesion</a></li>
              

            </ul>
          </div>
        </div>
      </nav>';

        echo "<section>";
     
        } else{
            ?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="index.php">HOMARKET</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
          </button>

          <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORIAS</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="sub-electro.php">Electrodomesticos</a>
                <a class="dropdown-item" href="sub-bebe.php">Bebés</a>
                <a class="dropdown-item" href="sub-electronicos.php">Electrónicos</a>
                <a class="dropdown-item" href="sub-salud.php">Salud</a>
                <a class="dropdown-item" href="sub-juegos.php">Juguetes</a>
                <a class="dropdown-item" href="carnes.php">Carnes</a>
                <a class="dropdown-item" href="sub-bebidas.php">Bebidas</a>
                <a class="dropdown-item" href="sub-limpieza.php">Limpieza y hogar</a>
                <a class="dropdown-item" href="sub-escuela.php">Zona Escolar</a>
                <a class="dropdown-item" href="sub-bakery.php">Bakery</a>
              </div>
            </li>
              <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
              

            </ul>
          </div>
        </div>
      </nav>
             <section class="sesion">
            <a id="glogin" href="login.php"><input type="button" class="cuenta" value="Iniciar Sesion" src="login.php"/></a>
            <a id="glogin2 " href="inicio_sesion.php"><input type="button" class="cuenta" value="Crear Cuenta" src="inicio_sesion.php"/></a>
        </section>
        <br>

        <?php
        }
         ?>
    <!-- END nav -->
            
        <br>
 <?php
     $link = new mysqli("localhost","root","","bdd");
            $consulta="SELECT * from  compras where id_usuario ='".$_SESSION ["usera"]."' ";
                   $re=$link ->query($consulta);
                       
                     

                      $te=$link ->query($consulta);
                 $tot=0;
            $total=0; 
    $i=1;


       

echo '<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>Lista de productos</th>
						        <th>&nbsp;</th>
						        <th>Precio</th>
						        <th>Cantidad</th>
						        <th>Sub-Total</th>
						      </tr>
						    </thead>
						    <tbody>';

                     while($tete=$te->fetch_assoc() ) {
             

      echo "<form id='fomr2' action='../php/compra.php' method='post' name='frm$i' <\n>";
echo '
						      <tr class="text-center">
						        <td class="product-remove"><input  class= "cuenta" type="submit" name="Configurar" value="X" /><input type="hidden" value='.$tete['id_compra'].' name="codigo2" /></td>';
						        
echo "<td class='image-prod'><img class='img' src='../html/administracion/php/img/".$tete['imagen']. "'></td>";
						        
		echo '				        <td class="product-name">
						        	<h3>'.$tete['producto'].'</h3>
						    
						        </td>
						        
						        <td class="price">$'.$tete['precio'].'</td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
						        	<input type="text" class="quantity form-control input-number" readonly value='.$tete['cantidad'].' name="cantidad"/> 
					          	</div>
					          </td>
						        
						        <td class="total">$'.$tete['precio']*$tete['cantidad'].'</td>
						      </tr><!-- END TR-->

						      
			';
                         
                         
       $tot1= $tete['precio']*$tete['cantidad'];
                       $tot +=  $tot1;
                           $total= $tot;
                       
                      if($i%6==0)
                             echo "</tr><tr>";
                             $i++;  
                          echo "</form>\n";
                      if (isset($_POST[$tete['id_compra']])) {
      require("../php/compra.php");
  }
                     }


           
           echo "<br>"; 
            
            if($total==0){
                 echo "<script>alert('No has realizado ninguna compra'); window.location.href='../html/index.php'</script>"; 
            }else{

            	echo '<tr class="text-center">
						        <td class="product-remove"><span "></span></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(images/product-4.jpg);"></div></td>
						        
						        <td class="product-name">
						        	<h3>TOTAL</h3>
						        	
						        </td>
						        
						        <td class="price">$'.$total.'</td>
						      </tr>
						      </tbody>
        </table>
			</div>
    	    </div>
    		</div>
			</div>
		</section>'
		;

            echo "<div class='pago'><a  href='./regis_domicilio.php'><input type='button' class='cuenta' value='A domicilio' src='./regis_domicilio.php'/></a><br>
         <br>
               <a  href='./scrip.php'><input type='button' class='cuenta' value='Retiro en sucursal'  src='./scrip.php '/></a>
               </div>";
            }
           
       
?>






		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Recibe e-mails sobre nuestras ultimas ofertas</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Ingrese su e-mail">
                <input type="submit" value="Suscribete" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Homarket</h2>
              <p>El supermercado en tu hogar; contamos con lo mejor de lo mejor desde aparatos electronicos hasta alimenticios.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>

          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Ayuda</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Terminos &amp; Condiciones</a></li>
	                <li><a href="#" class="py-2 d-block">Politicas de privacidad</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">Preguntas frecuentes</a></li>
	                <li><a href="#" class="py-2 d-block">Contacto</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">¿Tienes Preguntas?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Paseo Gral. Escalón 3700, San Salvador</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+503 2265 6360</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">homemarket@market.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <i class="icon-heart color-danger" aria-hidden="true"></i> by <a target="_blank">HOMARKET</a>

						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
    
  </body>
</html>