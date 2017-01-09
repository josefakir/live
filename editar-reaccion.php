<?php 
	include("auth.php");
	$id = $_GET['id'];
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
	$sql = "SELECT * FROM reacciones WHERE id = :id";
	$q = $dbh->prepare($sql);
	$q->execute(
		array(
			':id' => $id
			)
		);
	$result= $q->fetchAll();
	$r= $result[0];
	$rbd = $result[0];
	$reacciones = array();
	if($r['likes']!="0|0"){array_push($reacciones, 'like');}
	if($r['love']!="0|0"){array_push($reacciones, 'love');}
	if($r['haha']!="0|0"){array_push($reacciones, 'haha');}
	if($r['wow']!="0|0"){array_push($reacciones, 'shock');}
	if($r['sad']!="0|0"){array_push($reacciones, 'sad');}
	if($r['angry']!="0|0"){array_push($reacciones, 'angry');}
	$anchoreacciones = $r['anchoreacciones'];
	$explodelike = explode("|", $r['likes']);
	$topiconolike = ceil($explodelike[0]/2);
	$topcontadorlike = ceil($explodelike[1]/2);

	$explodelove = explode("|", $r['love']);
	$topiconolove = ceil($explodelove[0]/2);
	$topcontadorlove = ceil($explodelove[1]/2);

	$explodehaha = explode("|", $r['haha']);
	$topiconohaha = ceil($explodehaha[0]/2);
	$topcontadorhaha = ceil($explodehaha[1]/2);

	$explodeshock = explode("|", $r['wow']);
	$topiconoshock = ceil($explodeshock[0]/2);
	$topcontadorshock = ceil($explodeshock[1]/2);

	$explodesad = explode("|", $r['sad']);
	$topiconosad = ceil($explodesad[0]/2);
	$topcontadorsad = ceil($explodesad[1]/2);

	$explodeangry = explode("|", $r['angry']);
	$topiconoangry = ceil($explodeangry[0]/2);
	$topcontadorangry = ceil($explodeangry[1]/2);
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
				<h1 class="page-header">Editar Reacción:</h1>
			</div>
		</div><!--/.row-->					
		<div class="row">	
			<div class="col-md-6">
				<div id="dragcontainer" style="background:url(<?php echo $r['imagen'] ?>);  width: 960px; height: 540px; background-size: cover;cursor:all-scroll;">
					<?php 
					foreach($reacciones as $r){
						?>
						<div class="contenedoricono" style="float: left; width: <?php echo $anchoreacciones/2; ?>px;">
							<img src="emojis/<?php echo $r ?>.png" alt="" id="icono<?php echo $r ?>" class="iconodrag"
							<?php 
								switch ($r) {
									case 'like':
									echo ' style="top: '.$topiconolike.'px; "';
									break;
									case 'love':
									echo ' style="top: '.$topiconolove.'px; "';
									break;
									case 'haha':
									echo ' style="top: '.$topiconohaha.'px; "';
									break;
									case 'shock':
									echo ' style="top: '.$topiconoshock.'px; "';
									break;
									case 'sad':
									echo ' style="top: '.$topiconosad.'px; "';
									break;
									case 'angry':
									echo ' style="top: '.$topiconoangry.'px; "';
									break;

								}
							?>
							>
						</div>
						<?php
					}
					foreach($reacciones as $r){
						?>
						<div class="contenedornumero" id="numero<?php echo $r ?>" style="float: left; width: <?php echo $anchoreacciones/2; ?>px; text-align: center; font-family: 'Open Sans', sans-serif;font-size: 32px;text-shadow: 4px 4px 5px rgba(150, 150, 150, 1); ">
							0
						</div>
						<?php
					}
					?>
				</div>
				<p>&nbsp;</p>
				<form action="update/reaccion.php" method="post" id="form" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" value="<?php echo $rbd['nombre']; ?>">
					</div>
					<div class="form-group">
						<label>Color del contador</label>
						<select class="form-control" name="color">
							<option value="">Seleccione</option>
							<option value="#fff" <?php if($rbd['color']=="#fff"){ echo " selected ";} ?>>Blanco</option>
							<option value="#000" <?php if($rbd['color']=="#000"){ echo " selected ";} ?>>Negro</option>
						</select>
					</div>	
					<div class="form-group">
						<label>Cambiar imagen</label>
						<input type="file" name="foto">
					</div>
					<input type="hidden" id="iconoliketop" name="iconoliketop" value="<?php if(!empty( $_POST['like'])){echo "0";} ?>" class="require-one">
					<input type="hidden" id="iconolovetop" name="iconolovetop" value="<?php if(!empty( $_POST['love'])){echo "0";} ?>" class="require-one">
					<input type="hidden" id="iconohahatop" name="iconohahatop" value="<?php if(!empty( $_POST['haha'])){echo "0";} ?>" class="require-one">
					<input type="hidden" id="iconoshocktop" name="iconoshocktop" value="<?php if(!empty( $_POST['shock'])){echo "0";} ?>" class="require-one">
					<input type="hidden" id="iconosadtop" name="iconosadtop" value="<?php if(!empty( $_POST['sad'])){echo "0";} ?>" class="require-one">
					<input type="hidden" id="iconoangrytop" name="iconoangrytop" value="<?php if(!empty( $_POST['angry'])){echo "0";} ?>" class="require-one">
					<input type="hidden" id="numeroliketop" name="numeroliketop" value="<?php if(!empty( $_POST['like'])){echo "0";} ?>" class="require-one">
					<input type="hidden" id="numerolovetop" name="numerolovetop" value="<?php if(!empty( $_POST['love'])){echo "0";} ?>" class="require-one">
					<input type="hidden" id="numerohahatop" name="numerohahatop" value="<?php if(!empty( $_POST['haha'])){echo "0";} ?>" class="require-one">
					<input type="hidden" id="numeroshocktop" name="numeroshocktop" value="<?php if(!empty( $_POST['shock'])){echo "0";} ?>" class="require-one">
					<input type="hidden" id="numerosadtop" name="numerosadtop" value="<?php if(!empty( $_POST['sad'])){echo "0";} ?>" class="require-one">
					<input type="hidden" id="numeroangrytop" name="numeroangrytop" value="<?php if(!empty( $_POST['angry'])){echo "0";} ?>" class="require-one">
					<input type="hidden" id="anchoreacciones" name="anchoreacciones" value="<?php echo $anchoreacciones ?>">
					<div class="form-group">
						<label>Id de facebook: </label><input type="text" id="postid" name="postid" placeholder="ID DE PUBLICACIÓN EN FB" value="<?php echo $rbd['id_fb'] ?>">
					</div>
					<div class="form-group">
						<label for="" id="errorarrastre" style="color: red"></label>
					</div>
					<input type="hidden" name="id" value="<?php echo $rbd['id'] ?>">
					<button type="submit" class="btn btn-primary" id="finalizar">Finalizar</button>
				</form>
			</div>				
		</div><!--/.row-->
	</div>	<!--/.main-->
	<?php include("scripts.php"); ?>
	<script>
		$(document).ready(function(){
			$('#finalizar').click(function(e){
				$('#overlay').fadeIn('fast');
			});
			$('#form').validate({
				rules : {
					'postid' : 'required'
					
				},
				messages : {
					'postid' : 'Campo requerido'
				},
				errorClass: "authError",
				submitHandler : function(){
					return true
				},invalidHandler: function(){
					$('#overlay').fadeOut('fast');
				}
			});
			$( ".iconodrag" ).draggable({ 
				axis: "y",
				snap: true,
				containment: "#dragcontainer", 
				scroll: false,
				drag: function() {
					var position = $(this).position();
					id = $(this).attr('id');
					switch(id){
						case "iconolike":
						$('#iconoliketop').val(position.top);
						break;
						case "iconolove":
						$('#iconolovetop').val(position.top);
						break;
						case "iconohaha":
						$('#iconohahatop').val(position.top);
						break;
						case "iconoshock":
						$('#iconoshocktop').val(position.top);
						break;
						case "iconosad":
						$('#iconosadtop').val(position.top);
						break;
						case "iconoangry":
						$('#iconoangrytop').val(position.top);
						break;
					}
				}
			});
			$( ".contenedornumero" ).draggable({ 
				axis: "y",
				snap: true,
				containment: "#dragcontainer", 
				scroll: false,
				drag: function() {
					var position = $(this).position();
					id = $(this).attr('id');
					switch(id){
						case "numerolike":
						$('#numeroliketop').val(position.top);
						break;
						case "numerolove":
						$('#numerolovetop').val(position.top);
						break;
						case "numerohaha":
						$('#numerohahatop').val(position.top);
						break;
						case "numeroshock":
						$('#numeroshocktop').val(position.top);
						break;
						case "numerosad":
						$('#numerosadtop').val(position.top);
						break;
						case "numeroangry":
						$('#numeroangrytop').val(position.top);
						break;
					}
				} 
			});	
			<?php 
			foreach($reacciones as $r){
				switch ($r) {
					case 'like':
					?>$('#numerolike').css('top','<?php echo $topcontadorlike-40 ?>px');<?php
					break;
					case 'love':
					?>$('#numerolove').css('top','<?php echo $topcontadorlove-40 ?>px');<?php
					break;
					case 'haha':
					?>$('#numerohaha').css('top','<?php echo $topcontadorhaha-40 ?>px');<?php
					break;
					case 'haha':
					?>$('#numerohaha').css('top','<?php echo $topcontadorhaha-40 ?>px');<?php
					break;
					case 'shock':
					?>$('#numeroshock').css('top','<?php echo $topcontadorshock-40 ?>px');<?php
					break;
					case 'sad':
					?>$('#numerosad').css('top','<?php echo $topcontadorsad-40 ?>px');<?php
					break;
					case 'angry':
					?>$('#numeroangry').css('top','<?php echo $topcontadorangry-40 ?>px');<?php
					break;
				}
			}
			?>		
		});
	</script>
</body>

</html>
