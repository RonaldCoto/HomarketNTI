<?
@session_start();

if($_SESSION["autentica"] != "SIP"){
	header("Location: ../html/iniciar sesion.php");
	exit();
}
?>
