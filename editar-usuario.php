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
				<h1 class="page-header">Editar Usuario:</h1>
			</div>
		</div><!--/.row-->					
		<div class="row">	
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="form" role="form" method="post" action="update/usuario.php">
						<?php 
							$id = $_GET['id'];
							$dbh = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
							$sql = "SELECT * FROM usuarios WHERE id = :id order by correo";
							$q = $dbh->prepare($sql);
							$q->execute(
								array(
									':id' => $id
								)
							);
							$result= $q->fetchAll();
							$r= $result[0];
						?>
								<div class="form-group">
									<label>Correo Electrónico</label>
									<input class="form-control" name="correo" placeholder="ejemplo@ejemplo.com" value="<?php echo $r['correo'] ?>">
								</div>
																
								<div class="form-group">
									<label>Contraseña</label>
									<input type="password" class="form-control" name="password" id="pass">
								</div>
								<div class="form-group">
									<label>Confirmar Constraseña</label>
									<input type="password" class="form-control" name="password2" id="pass2">
								</div>
								<div class="form-group">
									<label>Rol de usuario</label>
									<select class="form-control" name="rol">
										<option value="">Seleccione</option>
										<option value="1" <?php if($r['rol']==1){echo " selected ";} ?>>Administrador</option>
										<option value="2" <?php if($r['rol']==2){echo " selected ";} ?>>Editor</option>
									</select>
								</div>		
								<input type="hidden" name="id" value="<?php echo $r['id'] ?>">						
								<button type="submit" class="btn btn-primary">Guardar</button>
								<button type="reset" class="btn btn-default">Reestablecer</button>
							</div>
						</form>						
					</div>
				</div>
			</div>							
		</div><!--/.row-->
	</div>	<!--/.main-->
	<?php include("scripts.php"); ?>
	<script>
		$(document).ready(function(){
			$('#form').validate({
				rules : {
					correo : {
						required : true,
						email : true
					},
				    password2: {
				      equalTo: "#pass"
				    },
				    rol : "required"
				},
				messages:{
					correo : {
						required : 'Campo requerido',
						email : 'Escriba un correo válido'
					},
				    password2: {
				      equalTo: "Las contraseñas no coinciden"
				    },
				    rol: "Campo requerido",
				}
			})
		})
	</script>
</body>

</html>
