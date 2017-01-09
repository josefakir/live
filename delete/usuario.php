<?php 
	include("../auth.php");
	$id = $_GET['id'];
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
	$sql = "DELETE FROM usuarios WHERE id = :id";
	$q = $dbh->prepare($sql);
	$q->execute(
		array(
			':id' => $id
		)
	);
	header("Location: ../usuarios.php");
?>