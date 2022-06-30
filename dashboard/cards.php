<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Administración de ventas</h1>
    
    <?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, nombre, precio, existencia, imagen, id_categoria, id_subcategoria FROM productos";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>
    
    <!--Carga de grafica -->
        <br>
<div class="container-fluid">
<div class="row">
<div class="col-sm-5 col-sm-offset-5" style=" -webkit-box-shadow: 0px 0px 15px -2px rgba(33,33,33,1);
-moz-box-shadow: 0px 0px 15px -2px rgba(33,33,33,1);
box-shadow: 0px 0px 15px -2px rgba(33,33,33,1); padding:3%; margin:40 auto; border-radius:20px; background:#eeeeee; margin-left:30%;">
<form class="form-horizontal" method="POST" action="cards.php" enctype="multipart/form-data">
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
						<option value="2021">2021</option>
					
                        
					</select>
</div>

<br>
<input type="submit" class="btn btn-lg btn-warning btn-block"  name="Busca"  value="Generar" />
</form>
    
       <?php  

 $connect = mysqli_connect("localhost","root","","bdd");  
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
    }else if($month == '08'){
        $tittle = "Agosto";
    }else if($month == '09'){
        $tittle = "Septiembre";
    }else if($month == '10'){
        $tittle = "Octubre" ;
    }else if($month == '11'){
        $tittle = "Noviembre";
    }else if($month == '12'){
        $tittle = "Diciembre";
    }
 
   
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
    }else if($_POST['busca1'] == '08'){
        $tittle = "Agosto";
    }else if($_POST['busca1'] == '09'){
        $tittle = "Septiembre";
    }else if($_POST['busca1'] == '10'){
        $tittle = "Octubre" ;
    }else if($_POST['busca1'] == '11'){
        $tittle = "Noviembre";
    }else if($_POST['busca1'] == '12'){
        $tittle = "Diciembre";
    }
         

    
    $busca1 = $_POST['busca1'];
    $busca2 = $_POST['busca2'];
    $query = "SELECT producto,SUM(cantidad) AS NVentas FROM ventas where month(fecha)='$busca1' and year(fecha)='$busca2' group by producto" ;  
 $result = mysqli_query($connect, $query);  
}

 ?>  
    </div>
    </div>
    </div>


    <center>

           <title>Total de ventas en el mes de  <?php echo $tittle." ";?> del 2020</title>  
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
                               echo "['".$row["producto"]."',".$row["NVentas"]."],";  
                              
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
        
   
           <br /><br />  
           <div style="width:1000px;">  
                <h3 align="center">Total de ventas en el mes de  <?php echo $tittle." ";?> del 2020</h3>  
                <br />  
                <div id="piechart" style="width: 1000px; height: 500px;"></div>  
           </div>  

        </center>
    <!-- Fin de carga de grafica -->
    
    
    
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>