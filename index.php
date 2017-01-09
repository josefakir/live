<!DOCTYPE html>
<html>
<head>
<?php include("head.php") ?>
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<img src="img/logo.png" alt="" id="logo">
				<div class="panel-heading tac">Iniciar Sesión</div>
				<div class="panel-body">
					<form role="form" method="post" action="login.php">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<input type="submit" class="btn btn-primary" value="Iniciar Sesión">
							<p class="error"><?php echo htmlentities(base64_decode($_GET['m'])); ?></p>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	<?php include("scripts.php"); ?>
</body>

</html>
