<?php 
	include("auth.php");
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
							<form id="form1" role="form" method="post" action="paso2.php" enctype="multipart/form-data">
								<div class="form-group">
									<label>Nombre</label>
									<input class="form-control" placeholder="Nombre de la reacción" name="nombre">
								</div>
								<div class="form-group">
									<label>Color del contador</label>
									<select class="form-control" name="color">
										<option value="">Seleccione</option>
										<option value="#fff">Blanco</option>
										<option value="#000">Negro</option>
									</select>
								</div>		
								<div class="form-group checkboxvalidate">
									<label>Utilizar las siguientes reacciones</label>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="like" value="like" class="require-one"> <img src="emojis/like.png" alt="" style="width: 20px;"> Like
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox"  name="love" value="love" class="require-one"> <img src="emojis/love.png" alt="" style="width: 20px;"> Love
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="haha" value="haha" class="require-one"> <img src="emojis/haha.png" alt="" style="width: 20px;"> Haha
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="shock" value="shock" class="require-one"> <img src="emojis/shock.png" alt="" style="width: 20px;"> Wow
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="sad" value="sad" class="require-one"> <img src="emojis/sad.png" alt="" style="width: 20px;"> Sad
										</label>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" name="angry" value="angry" class="require-one"> <img src="emojis/angry.png" alt="" style="width: 20px;"> Angry
										</label>
									</div>
								</div>			
								<div class="form-group">
									<label>Imagen</label>
									<input type="file" name="foto">
									 <p class="help-block">Imagen: (1920 x 1080).</p>
								</div>
								<button type="submit" class="btn btn-primary">Siguiente</button>
								<button type="reset" class="btn btn-default">Reestablecer</button>
							</div>
							
						</form>
					</div>				
		</div><!--/.row-->
	</div>	<!--/.main-->
	<?php include("scripts.php"); ?>
	<script>
		$(document).ready(function(){

			$('#form1').validate({
				rules : {
					nombre : 'required',
					color : 'required',
					reaccion : 'required',
					foto : 'required'
				},
				messages : {
					nombre : 'Campo requerido',
					color : 'Campo requerido',
					reaccion : 'Campo requerido',
					foto : 'Campo requerido'
				},
				errorClass: "authError",
			})
			$.validator.addMethod('require-one', function(value) {
				console.log(value);
				if($('.require-one:checked').size() > 1){
					return true
				}else{
					return false
				}
			}, 'Seleccione al menos dos opciones');
		});
	</script>
</body>

</html>
