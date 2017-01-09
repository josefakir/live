<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include("../auth.php");
	include("../funciones.php");
	$nombre = $_POST['nombre'];
	$color = $_POST['color'];
	$anchoreacciones = $_POST['anchoreacciones'];
	$iconoliketop = $_POST['iconoliketop']*2;
	$iconolovetop = $_POST['iconolovetop']*2;
	$iconohahatop = $_POST['iconohahatop']*2;
	$iconoshocktop = $_POST['iconoshocktop']*2;
	$iconosadtop = $_POST['iconosadtop']*2;
	$iconoangrytop = $_POST['iconoangrytop']*2;
	$numeroliketop = $_POST['numeroliketop']*2;
	$numerolovetop = $_POST['numerolovetop']*2;
	$numerohahatop = $_POST['numerohahatop']*2;
	$numeroshocktop = $_POST['numeroshocktop']*2;
	$numerosadtop = $_POST['numerosadtop']*2;
	$numeroangrytop = $_POST['numeroangrytop']*2;
	$anchoreacciones = $_POST['anchoreacciones'];
	$postid = $_POST['postid'];
	$id = $_POST['id'];
	$status = 1;
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
	$sql = "SELECT * FROM reacciones WHERE id = :id";
	$q = $dbh->prepare($sql);
	$q->execute(array(':id'=>$id));
	$result= $q->fetchAll()[0];
	$parametros = array(':nombre'=>$nombre);
	$sql = "UPDATE reacciones SET nombre = :nombre, ";
	if(!empty($iconoliketop) or (!empty($numeroliketop))){
		$sql .= " likes = :likes, ";
		if(!empty($iconoliketop) and !empty($numeroliketop)){
			$parametros[':likes'] = $iconoliketop."|".$numeroliketop;
		}else{
			if(!empty($iconoliketop)){
				$numero = explode("|",$result['likes']);
				$numero = $numero[1];
				$parametros[':likes'] = $iconoliketop."|".$numero;
			}
			if(!empty($numeroliketop)){
				$numero = explode("|",$result['likes']);
				$numero = $numero[0];
				$parametros[':likes'] = $numero."|".$numeroliketop;
			}
		}
	}
	if(!empty($iconolovetop) or (!empty($numerolovetop))){
		$sql .= " love = :love, ";
		if(!empty($iconolovetop) and !empty($numerolovetop)){
			$parametros[':love'] = $iconolovetop."|".$numerolovetop;
		}else{
			if(!empty($iconolovetop)){
				$numero = explode("|",$result['love']);
				$numero = $numero[1];
				$parametros[':love'] = $iconolovetop."|".$numero;
			}
			if(!empty($numerolovetop)){
				$numero = explode("|",$result['love']);
				$numero = $numero[0];
				$parametros[':love'] = $numero."|".$numerolovetop;
			}
		}
	}
	if(!empty($iconohahatop) or (!empty($numerohahatop))){
		$sql .= " haha = :haha, ";
		if(!empty($iconohahatop) and !empty($numerohahatop)){
			$parametros[':haha'] = $iconohahatop."|".$numerohahatop;
		}else{
			if(!empty($iconohahatop)){
				$numero = explode("|",$result['haha']);
				$numero = $numero[1];
				$parametros[':haha'] = $iconohahatop."|".$numero;
			}
			if(!empty($numerohahatop)){
				$numero = explode("|",$result['haha']);
				$numero = $numero[0];
				$parametros[':haha'] = $numero."|".$numerohahatop;
			}
		}
	}
	if(!empty($iconoshocktop) or (!empty($numeroshocktop))){
		$sql .= " wow = :wow, ";
		if(!empty($iconoshocktop) and !empty($numeroshocktop)){
			$parametros[':wow'] = $iconoshocktop."|".$numeroshocktop;
		}else{
			if(!empty($iconoshocktop)){
				$numero = explode("|",$result['wow']);
				$numero = $numero[1];
				$parametros[':wow'] = $iconoshocktop."|".$numero;
			}
			if(!empty($numeroshocktop)){
				$numero = explode("|",$result['wow']);
				$numero = $numero[0];
				$parametros[':wow'] = $numero."|".$numeroshocktop;
			}
		}
	}
	if(!empty($iconosadtop) or (!empty($numerosadtop))){
		$sql .= " sad = :sad, ";
		if(!empty($iconosadtop) and !empty($numerosadtop)){
			$parametros[':sad'] = $iconosadtop."|".$numerosadtop;
		}else{
			if(!empty($iconosadtop)){
				$numero = explode("|",$result['sad']);
				$numero = $numero[1];
				$parametros[':sad'] = $iconosadtop."|".$numero;
			}
			if(!empty($numerosadtop)){
				$numero = explode("|",$result['sad']);
				$numero = $numero[0];
				$parametros[':sad'] = $numero."|".$numerosadtop;
			}
		}
	}
	if(!empty($iconoangrytop) or (!empty($numeroangrytop))){
		$sql .= " angry = :angry, ";
		if(!empty($iconoangrytop) and !empty($numeroangrytop)){
			$parametros[':angry'] = $iconoangrytop."|".$numeroangrytop;
		}else{
			if(!empty($iconoangrytop)){
				$numero = explode("|",$result['angry']);
				$numero = $numero[1];
				$parametros[':angry'] = $iconoangrytop."|".$numero;
			}
			if(!empty($numeroangrytop)){
				$numero = explode("|",$result['angry']);
				$numero = $numero[0];
				$parametros[':angry'] = $numero."|".$numeroangrytop;
			}
		}
	}
	if($_FILES['foto']['size']!=0){
		$target_path = "../uploads/";
		$target_path = $target_path . date('Ymdhis').str_replace(" ","_",sanear_string(basename( $_FILES['foto']['name']))); 
		move_uploaded_file($_FILES['foto']['tmp_name'], $target_path);
		$path = $target_path;
		$sql .= " imagen = :imagen, ";
		$parametros[':imagen'] = "uploads/".$path;
	}
	$sql .= " id_fb = :id_fb, ";
	$parametros[':id_fb'] = $postid;
	$sql .= " color = :color ";
	$parametros[':color'] = $color;
	$sql .= "WHERE id = :id";
	$parametros[':id']= $id;
	$q = $dbh->prepare($sql);
	$result = $q->execute($parametros);
	header("Location: ../editar-reaccion.php?id=".$id);
?>