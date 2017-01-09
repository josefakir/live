<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include("auth.php");
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
	$status = 1;
	$id = $_POST['id'];
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
	$sql = "UPDATE reacciones 
	SET 
	likes = :likes, 
	love = :love, 
	haha = :haha, 
	wow = :wow, 
	sad = :sad, 
	angry = :angry, 
	anchoreacciones = :anchoreacciones,
	id_fb = :id_fb,status = :status WHERE id = :id";
	$q = $dbh->prepare($sql);
	$result = $q->execute(
		array(
			':likes' => $iconoliketop."|".$numeroliketop,
			':love' => $iconolovetop."|".$numerolovetop,
			':haha' => $iconohahatop."|".$numerohahatop,
			':wow' => $iconoshocktop."|".$numeroshocktop,
			':sad' => $iconosadtop."|".$numerosadtop,
			':angry' => $iconoangrytop."|".$numeroangrytop,
			':anchoreacciones' => $anchoreacciones,
			':id_fb' => $postid,
			':status' => $status,
			':id' => $id,
		)
	);
	
?>
<!DOCTYPE html>
<html>
<head>
<?php include("head.php") ?>
</head>

<body>
	<?php include("navusuario.php"); ?>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<?php include("navegacion.php") ?>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Reacción generada:</h1>
			</div>
		</div><!--/.row-->					
		<div class="row">	
			<div class="col-md-6">
				<a href="<?php echo $url."generador/index.php?id=".$id; ?>" target="_blank"><?php echo $url."generador/index.php?id=".$id; ?></a>
			</div>				
		</div><!--/.row-->
	</div>	<!--/.main-->
	<?php include("scripts.php"); ?>
	
</body>

</html>
