<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	setcookie("idioma_sel", $_GET["idioma"], time()+86400);
	header("Location:vercookie.php");
	?>

</body>
</html>