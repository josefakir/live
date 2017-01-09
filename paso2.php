<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include("auth.php");
	include("funciones.php");
	$target_path = "uploads/";
	$target_path = $target_path . date('Ymdhis').str_replace(" ","_",sanear_string(basename( $_FILES['foto']['name']))); 
	move_uploaded_file($_FILES['foto']['tmp_name'], $target_path);
	$path = $_FILES['foto']['name'];
	$reacciones = array();
	if(!empty( $_POST['like'])){array_push($reacciones, $_POST['like']);}
	if(!empty( $_POST['love'])){array_push($reacciones, $_POST['love']);}
	if(!empty( $_POST['haha'])){array_push($reacciones, $_POST['haha']);}
	if(!empty( $_POST['shock'])){array_push($reacciones, $_POST['shock']);}
	if(!empty( $_POST['sad'])){array_push($reacciones, $_POST['sad']);}
	if(!empty( $_POST['angry'])){array_push($reacciones, $_POST['angry']);}
	$numerodereacciones = count($reacciones);
	$anchoreacciones =  1920/$numerodereacciones;
	$nombre = $_POST['nombre'];
	$color = $_POST['color'];
	$status = 0;
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
				<h1 class="page-header">Agregar Reacción:</h1>
			</div>
		</div><!--/.row-->					
		<div class="row">	
			<div class="col-md-6">
				<div id="dragcontainer" style="background:url(<?php echo $target_path ?>);  width: 960px; height: 540px; background-size: cover;cursor:all-scroll;">
								<?php 
									foreach($reacciones as $r){
										?>
										<div class="contenedoricono" style="float: left; width: <?php echo $anchoreacciones/2; ?>px">
											<img src="emojis/<?php echo $r ?>.png" alt="" id="icono<?php echo $r ?>" class="iconodrag">
										</div>
										<?php
									}
									foreach($reacciones as $r){
										?>
										<div class="contenedornumero" id="numero<?php echo $r ?>" style="float: left; width: <?php echo $anchoreacciones/2; ?>px; text-align: center; font-family: 'Open Sans', sans-serif;font-size: 32px;text-shadow: 4px 4px 5px rgba(150, 150, 150, 1);">
											0
										</div>
										<?php
									}
								?>
							</div>
							<p>&nbsp;</p>
							<form action="fin.php" method="post" id="form">
								<input type="hidden" name="color" value="<?php echo $color ?>">
								<input type="hidden" name="nombre" value="<?php echo $nombre ?>">
								<input type="hidden" name="anchoreacciones" value="<?php echo $anchoreacciones ?>">
								<input type="hidden" name="imagen" value="<?php echo $target_path ?>">
								<input type="hidden" name="cantidad" value="<?php echo $numerodereacciones ?>">
								<input type="hidden" name="status" value="<?php echo $status ?>">
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
									<label>Id de facebook: </label><input type="text" id="postid" name="postid" placeholder="ID DE PUBLICACIÓN EN FB">
								</div>
								<div class="form-group">
									<label for="" id="errorarrastre" style="color: red"></label>
								</div>
								<input type="hidden" name="id" value="<?php echo $lastId ?>">
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
					if($('#iconoliketop').val()=='0' || $('#iconolovetop').val()=='0' || $('#iconohahatop').val()=='0' || $('#iconoshocktop').val()=='0' || $('#iconosadtop').val()=='0' || $('#iconoangrytop').val()=='0' || $('#numeroliketop').val()=='0' || $('#numerolovetop').val()=='0' || $('#numerohahatop').val()=='0' || $('#numeroshocktop').val()=='0' || $('#numerosadtop').val()=='0' || $('#numeroangrytop').val()=='0'){
						$('#errorarrastre').html('Por favor, arrastre todos los íconos de reacciones y conteos, no pueden quedar en la posición inicial');
						$('#overlay').fadeOut('fast');
					}else{
						return true
					}
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
		});
	</script>
</body>

</html>
