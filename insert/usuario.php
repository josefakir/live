<?php 
	include("../auth.php");
	$correo = $_POST['correo'];
	$contrasena = md5($_POST['password']);
	$rol = $_POST['rol'];
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
	$sql = "INSERT INTO usuarios (correo,contrasena,rol) values (:correo,:contrasena,:rol)";
	$q = $dbh->prepare($sql);
	$q->execute(
		array(
			':correo' => $correo,
			':contrasena' => $contrasena,
			':rol' => $rol,
		)
	);
	header("Location: ../usuarios.php");
?>