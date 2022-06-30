<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Registro de domicilio</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="cards">
			<div class="card-header">
				<h3>Ingrese la direcci&oacute;n de su domicilio</h3>
			</div>
			<div class="card-body">
				<form action="../html/domicilio.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="direccion" placeholder="Ciudad/colonia/pasaje">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
                        <select class="form-control" id="departamentos" name="departamentos">
                              <option value="Santa ana">Santa Ana</option>
                                  <option value="Ahuachapan">Ahuachapan</option>
                                  <option value="Sonsonate">Sonsonate</option>
                                  <option value="La Libertad">La Libertad</option>
                                  <option value="Chalatenango">Chalatenango</option>
                                  <option value="San Salvador">San Salvador</option>
                                  <option value="Cabañas">Cabanas</option>
                                  <option value="Cuscatlan">Cuscatlan</option>
                                  <option value="La Paz">La Paz</option>
                                  <option value="San Vicente">San Vicente</option>
                                  <option value="Usulutan">Usulutan</option>
                                  <option value="San Miguel">San Miguel</option>
                                  <option value="Morazan">Morazan</option>
                                  <option value="La union">La union</option>
                             </select>

					</div>
					<div class="form-group">
						<input type="submit" value="registro" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>