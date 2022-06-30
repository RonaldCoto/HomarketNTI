

 

<!DOCTYPE html>
<html lang="en" class="no--js">
<head>
<meta charset="UTF-8"/>

  <title>Ganancias mensuales</title>
   <link rel="stylesheet" type="text/css" href="../css1/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../js1/bootstrap.min.js"></script>
    <style type="text/css"> .navbar-brand {font-size: 2em;} .active{font-size: 5em;}</style>
    <link rel="stylesheet" type="text/css" href="../css/general.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">

      </button>
      <a class="navbar-brand" href="#">UNIMETAL</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../php/login.php">PERFIL<span class="sr-only">(current)</span></a></li>
        

        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> PRODUCTO <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">

            
            <li class="active"><a href="../html/Articulo.php">REGISTRAR PRODUCTO</a></li>
            <li class="active"><a href="../php/MostrarArticulos.php">MOSTRAR PRODUCTOS</a></li>
            <li class="active"><a href="../php/sacar_anadir.php">INGRESAR EXISTENCIAS</a></li>
            
           
          </ul>
        </li>


        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> CATEGORIAS <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">

            
            <li class="active"><a href="../html/Categoria.html">REGISTRAR CATEGORIA</a></li>
            <li class="active"><a href="../php/MostrarCategorias.php">MOSTRAR CATEGORIA</a></li>
            
            
           
          </ul>
        </li>


        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> PROVEEDORES <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">

            
            <li class="active"><a href="../html/Proveedor.html">REGISTRAR PROVEEDORES</a></li>
            <li class="active"><a href="../php/MostrarProveedores.php">MOSTRAR PROVEEDORES</a></li>

          </ul>
        </li>


        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> VER ESTADISTICAS <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">

            
            <li class="active"><a href="#">GANANCIAS DE UN DIA</a></li>
            <li class="active"><a href="../grafica/index.php">VENTAS DE UN MES</a></li>

          </ul>
        </li>

        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">CONTROL DE CUENTAS<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">

            
           <li class="active"><a href="../html/ActualizarEmpleadoA.php">ACTUALIZAR MIS DATOS</a></li>
            <li class="active"><a href="../php/Activar_Desactivar.php">ACTIVAR-DESACTIVAR CUENTAS</a></li>
             <li class="active"><a href="../html/Empleado.php">REGISTRAR EMPLEADO</a></li>

          </ul>
        </li>

       
        
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../php/cerrarsesion.php">CERRAR SESION</a></li>
      </ul>
    </div>
  </div>
</nav>

    <br>
<div class="container-fluid">
<div class="row">
<div class="col-sm-5 col-sm-offset-5" style=" -webkit-box-shadow: 0px 0px 15px -2px rgba(33,33,33,1);
-moz-box-shadow: 0px 0px 15px -2px rgba(33,33,33,1);
box-shadow: 0px 0px 15px -2px rgba(33,33,33,1); padding:3%; margin:40 auto; border-radius:20px; background:#eeeeee; margin-left:30%;">
<form class="form-horizontal" method="POST" action="index.php" enctype="multipart/form-data">
<div class="form-group">
<label>Seleccionar mes:</label>
					<select name="busca1" id="type" class='form-control' required>
						<option value="">--Seleccionar mes--</option>
						<option value="1">Enero</option>
						<option value="2">Febrero</option>
                        <option value="3">Marzo</option>
						<option value="4">Abril</option>
                        <option value="5">Mayo</option>
						<option value="6">Junio</option>
                        <option value="7">Julio</option>
						<option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
						<option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
					</select>
    
<br>
    <label>Seleccionar año:</label>
					<select name="busca2" id="type" class='form-control' required>
						<option value="">--Seleccionar año--</option>
						<option value="2019">2019</option>
					
                        
					</select>
</div>

<br>
<input type="submit" class="btn btn-lg btn-warning btn-block"  name="Busca"  value="Generar" />
</form>
    
       <?php  

 $connect = mysqli_connect("localhost","root","","proyecto");  
$year = date('Y');
$month = date('m');
if (empty($_POST['busca1'])){
  
    if($month == 01){
        $tittle = "Enero";
    }else if($month == 02){
        $tittle = "Febrero";
    }else if($month == 03){
        $tittle = "Marzo";
    }else if($month == 04){
        $tittle = "Abril";
    }else if($month == 05){
        $tittle = "Mayo";
    }else if($month == 06){
        $tittle = "Junio";
    }else if($month == 07){
        $tittle = "Julio";
    }else if($month == 08){
        $tittle = "Agosto";
    }else if($month == 09){
        $tittle = "Septiembre";
    }else if($month == 10){
        $tittle = "Octubre" ;
    }else if($month == 11){
        $tittle = "Noviembre";
    }else if($month == 12){
        $tittle = "Diciembre";
    }
 
 $query = "SELECT nombre,SUM(cantidad) AS Ventas FROM ventasconcretadas where month(fechadeventa)='$month' and year(fechadeventa)='$year' group by nombre" ;  
 $result = mysqli_query($connect, $query);  
    }else{
    
    if($_POST['busca1'] == 01){
        $tittle = "Enero";
    }else if($_POST['busca1'] == 02){
        $tittle = "Febrero";
    }else if($_POST['busca1'] == 03){
        $tittle = "Marzo";
    }else if($_POST['busca1'] == 04){
        $tittle = "Abril";
    }else if($_POST['busca1'] == 05){
        $tittle = "Mayo";
    }else if($_POST['busca1'] == 06){
        $tittle = "Junio";
    }else if($_POST['busca1'] == 07){
        $tittle = "Julio";
    }else if($_POST['busca1'] == 08){
        $tittle = "Agosto";
    }else if($_POST['busca1'] == 09){
        $tittle = "Septiembre";
    }else if($_POST['busca1'] == 10){
        $tittle = "Octubre" ;
    }else if($_POST['busca1'] == 11){
        $tittle = "Noviembre";
    }else if($_POST['busca1'] == 12){
        $tittle = "Diciembre";
    }
         

    
    $busca1 = $_POST['busca1'];
    $busca2 = $_POST['busca2'];
    $query = "SELECT nombre,SUM(cantidad) AS Ventas FROM ventasconcretadas where month(fechadeventa)='$busca1' and year(fechadeventa)='$busca2' group by nombre" ;  
 $result = mysqli_query($connect, $query);  
}

 ?>  
    </div>
    </div>
    </div>
    <br>
    

<br>
    
 
    
<html>  
     <center>
    
  

   
          
           <title>Total de ventas en el mes de  <?php echo $tittle." ";?> del 2019</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Articulo', 'Total de venta'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["nombre"]."',".$row["Ventas"]."],";  
                              
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Total de ventas por articulo',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
        
   
          
      <body>  
           <br /><br />  
           <div style="width:1000px;">  
                <h3 align="center">Total de ventas en el mes de  <?php echo $tittle." ";?> del 2019</h3>  
                <br />  
                <div id="piechart" style="width: 1000px; height: 500px;"></div>  
           </div>  
      </body>  
           </center>
 </html>  
<br>
<br>
</body>
</html>


 