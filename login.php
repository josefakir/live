<?php
    session_start();
	include("config.php");
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
	$sql = "SELECT * FROM usuarios WHERE correo = :email and contrasena = :password";
    $q = $dbh->prepare($sql);
    $q->execute(array(
    	':email' => $email,
    	':password' => $password,
    )
    );
    $result= $q->fetch();
    if(!empty($result)){
    	$_SESSION['auth'] = true;
        $_SESSION['id_usuario'] = $result['id'];
        $_SESSION['rol'] = $result['rol'];
        header("Location: inicio.php");
        print_r($_SESSION);
        echo "auth";
    }else{
        echo "no auth";
    	header("Location: index.php?m=".htmlentities(base64_encode("Error de usuario y/o contraseña")));
    }
?>