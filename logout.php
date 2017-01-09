<?php 
	session_start();
	session_destroy();
	header("Location: index.php?m=".htmlentities(base64_encode("Tu sesión ha finalizado")));
?>