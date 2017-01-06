<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reacciones GM</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Reacciones</span>GM</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			
			<li class="active"><a href="index.php"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>FB Live</a></li>
			
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Agregar nueva</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Nueva Reacción</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form id="form1" role="form" method="post" action="paso2.php" enctype="multipart/form-data">
							
								<div class="form-group">
									<label>Nombre</label>
									<input class="form-control" placeholder="Nombre de la reacción" name="nombre">
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
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
		$(document).ready(function(){

			$('#form1').validate({
				rules : {
					nombre : 'required',
					reaccion : 'required',
					foto : 'required'
				},
				messages : {
					nombre : 'Campo requerido',
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
