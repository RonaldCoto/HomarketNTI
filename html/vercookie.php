<?php
if (!$_COOKIE["idioma_sel"]) {
	
	header("Location:idioma.php");
	
}else if($_COOKIE["idioma_sel"]=="es"){

	header("Location:index.php");

}else if($_COOKIE["idioma_sel"]=="in"){

	header("Location:../Homarket_ingles/html/index.php");

}
?>