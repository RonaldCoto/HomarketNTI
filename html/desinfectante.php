<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Desinfectante</title>
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

    <div class="hero-wrap hero-bread" style="background-image: url('../images/de.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">

            <h1 class="mb-0 bread">Desinfectante</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">

 <?php
     $link = new mysqli("localhost","root","","bdd");
  $consulta="SELECT * from  productos where id_subcategoria=27 and existencia>0";
   $i=1;

    $te=$link ->query($consulta);
        
                echo  "<div class='row'>";
        

        while($tete=$te->fetch_assoc() ) {
            echo '<style type="text/css">
                  form{ display: contents;}
                  </style>';
   if (isset($_SESSION["usera"] )){

       echo "<form action='../php/compra.php' method='Post' name='frm$i' > ";
     
        } else{
            echo "<form action='./login.php' method='Post' name='frm$i'>";
            
        }        
   
        echo "<div class='col-md-6 col-lg-3 ftco-animate'>";
        echo "<div class='product'>";
        echo '<a href="#" class="img-prod"><img class="img-fluid" src="../html/administracion/php/img/'.$tete['imagen'].'" alt="Colorlib Template">';
        echo "<div class='overlay'></div>";
        echo "</a>";
        echo "<div class='text py-3 pb-4 px-3 text-center'>";
        echo "<h3><a href='#'>".$tete['nombre']."</a></h3>";
        echo "<input type='number' min='1' max='100'  value='1' name='cantidad' required />";
        echo "<div class='d-flex'>";
        echo "<div class='pricing'>";
        echo "<p class='price'><span class='price-sale'>$".$tete['precio']."</span></p>";
        echo "</div>";
        echo "</div>";
        echo "<div class='bottom-area d-flex px-3'>";
        echo "<div class='m-auto d-flex'>";
        echo "<input type='submit'  name='compra' class='buy-now d-flex justify-content-center align-items-center mx-1' value=' '  />";
        echo "<input type='hidden' value=".$tete['id']." name='codigo' />";
        echo "</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</form>";
          $i++;
        if (isset($_SESSION["usera"] )){
           
        if (isset($_POST[$tete['id']])) {

        require("../php/compra.php");
     
        } else{
            if (isset($_POST[$tete['id']])) {
        require("./login.php");
            
        }               
}
}

}
            echo "</div>";        


?>

    	<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
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