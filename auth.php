<?php 
	session_start();
	include("config.php");
	if(!$_SESSION['auth']){
		session_destroy();
    	header("Location: index.php?m=".htmlentities(base64_encode("Necesitas iniciar sesión para ver esta página")));
	}
?>