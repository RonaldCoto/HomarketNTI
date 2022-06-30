<!DOCTYPE html>
<html lang="en">
  <head>
    <title>About</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
     <link rel="stylesheet" href="../css/ul.css">
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
<!-- contenido -->
        <div class="container">
          <div class="contenedor">
            <div class="info">
              <h1>CONOCE NUESTRA HISTORIA</h1>
              <p>HOMEMARKET está aquí para brindarle más información, responder cualquier pregunta que pueda tener y crear una solución efectiva para sus necesidades de instrucción.</p>
              <p>En 2007, HOMEMARKET incrementa con 53 Supermercados, la red de Supermercados HOMEMARKET, consolidando así su expansión. Ese mismo año, la Cooperativa también adquiere 62 supermercados, reforzando su posición estratégica. En mayo de 2010 adquiere 21 supermercados, siguiendo su política de expansión orgánica.</p>
              <p>Actualmente, HOMEMARKET desarrolla su actividad en el sector de la distribución a través de una red comercial formada por más de 730 supermercados . Tiene una plantilla que supera los 15.363 trabajadores, más de 3.300.000 de socios-clientes.</p>
            </div>
          </div>
        </div>
        <div class="container">
          <img src="https://www.florette.es/wp-content/uploads/2019/07/atrezzo-compromiso.png" style="width: 100%;">    
        </div>
        <div style='background-image: url("https://www.florette.es/wp-content/uploads/2019/05/florette-bg-nuestra-historia-counter.jpg"); '>
          <div class="container"><br><br>
            <div class="contenedor">
              <div class="infos">
                <h3>Misión</h3>
                <p>Satisfacer a nuestros socios y clientes con una compra única de calidad, variedad, precio y servicio, basada en la atención y el compromiso de nuestros trabajadores.</p>
              </div>
              <div class="infos">
                <h3>Visión</h3>
                <p>Ser una cooperativa independiente, innovadora, honesta y sostenible en la que comprar con capacidad de elección y buenos precios. Es decir, ser un modelo de empresa referente en el sector de la distribución.</p>
              </div>
              <div class="infos">
                <h3>Valores</h3>
                <p>Escuchar al cliente, a los trabajadores, a los proveedores y a nuestro entorno, aportar productos, formación, información, bienestar, desarrollo y sostenibilidad y responsabilizarse con compromiso, honestidad y respeto.</p>
              </div>
            </div>
            <div class="contenedor">
              <div class="infos">
                <h3>+30 proveedores</h3>
                <p>Para surtir nuestra gran variedad.</p>
              </div>
              <div class="infos">
                <h3>+900 trabajadores</h3>
                <p>Distribuidos en todo el territorio nacional para hacer la entrega de productos.</p>
              </div>
              <div class="infos">
                <h3>+60 variedades de productos</h3>
                <p>Distribuidos en nuestras amplias categorias</p>
              </div>
            </div>
          </div>
        </div>
        <div style="background-color: #82AE46;">
          <div class="container">
            <div class="fo">
              <h3 style="color:white;">Estamos comprometidos con nuestros clientes y solventar las necesidades de nuestros productos, con la mejor calidad y mejores precios</h3>
            </div>
          </div>
        </div>
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