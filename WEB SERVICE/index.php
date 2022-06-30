<!DOCTYPE html>
<html lang="en">
<head>
	
	
	<title>WebService</title>
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
    
    <link rel="stylesheet" href="css/nuevo.css"> 

</head>
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
              <li class="nav-item active"><a href="../html/index.php" class="nav-link">Home</a></li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORIAS</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="../html/sub-electro.php">Electrodomesticos</a>
                <a class="dropdown-item" href="../html/sub-bebe.php">Bebés</a>
                <a class="dropdown-item" href="../html/sub-electronicos.php">Electrónicos</a>
                <a class="dropdown-item" href="../html/sub-salud.php">Salud</a>
                <a class="dropdown-item" href="../html/sub-juegos.php">Juguetes</a>
                <a class="dropdown-item" href="../html/carnes.php">Carnes</a>
                <a class="dropdown-item" href="../html/sub-bebidas.php">Bebidas</a>
                <a class="dropdown-item" href="../html/sub-limpieza.php">Limpieza y hogar</a>
                <a class="dropdown-item" href="../html/sub-escuela.php">Zona Escolar</a>
                <a class="dropdown-item" href="../html/sub-bakery.php">Bakery</a>
              </div>
            </li>
              <li class="nav-item"><a href="../html/about.html" class="nav-link">About</a></li>
              <li class="nav-item"><a href="../html/contact.html" class="nav-link">Contactanos</a></li>
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
              <li class="nav-item active"><a href="../html/index.php" class="nav-link">Home</a></li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORIAS</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="../html/sub-electro.php">Electrodomesticos</a>
                <a class="dropdown-item" href="../html/sub-bebe.php">Bebés</a>
                <a class="dropdown-item" href="../html/sub-electronicos.php">Electrónicos</a>
                <a class="dropdown-item" href="../html/sub-salud.php">Salud</a>
                <a class="dropdown-item" href="../html/sub-juegos.php">Juguetes</a>
                <a class="dropdown-item" href="../html/carnes.php">Carnes</a>
                <a class="dropdown-item" href="../html/sub-bebidas.php">Bebidas</a>
                <a class="dropdown-item" href="../html/sub-limpieza.php">Limpieza y hogar</a>
                <a class="dropdown-item" href="../html/sub-escuela.php">Zona Escolar</a>
                <a class="dropdown-item" href="../html/sub-bakery.php">Bakery</a>
              </div>
            </li>
              <li class="nav-item"><a href="../html/about.html" class="nav-link">About</a></li>
              <li class="nav-item"><a href="../html/contact.html" class="nav-link">Contactanos</a></li>
              

            </ul>
          </div>
        </div>
      </nav>
             <section class="sesion">
            <a id="glogin" href="../html/login.php"><input type="button" class="cuenta" value="Iniciar Sesion" src="login.php"/></a>
            <a id="glogin2 " href="../html/inicio_sesion.php"><input type="button" class="cuenta" value="Crear Cuenta" src="inicio_sesion.php"/></a>
        </section>
        <br>

        <?php
        }
         ?>
<section class="principal">

	<h1>Busqueda de Producto</h1>

	<div class="formulario">
		<label for="caja_busqueda">Buscar</label>
		<input type="text" name="caja_busqueda" id="caja_busqueda"></input>

		
	</div>

	<div id="datos"></div>
	
	
</section>



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
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

</body>

</html>