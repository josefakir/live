<?php 
	include("../auth.php");
	$id = $_POST['id'];
	$correo = $_POST['correo'];
	$contrasena = md5($_POST['password']);
	$rol = $_POST['rol'];
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
	if(!empty($_POST['password'])){
		$sql = "UPDATE usuarios SET correo=:correo,contrasena=:contrasena,rol=:rol WHERE id = :id";
		$q = $dbh->prepare($sql);
		$q->execute(
			array(
				':correo' => $correo,
				':contrasena' => $contrasena,
				':rol' => $rol,
				':id' => $id
			)
		);
	}else{
		$sql = "UPDATE usuarios SET correo=:correo,rol=:rol WHERE id = :id";
		$q = $dbh->prepare($sql);
		$q->execute(
			array(
				':correo' => $correo,
				':rol' => $rol,
				':id' => $id
			)
		);
	}
	header("Location: ../editar-usuario.php?id=".$id);

?>