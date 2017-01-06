<?php include('functions.php') ?>
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
<link rel="stylesheet" href="js/jquery-ui.structure.min.css">
<link rel="stylesheet" href="js/jquery-ui.theme.min.css">

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
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Aquí tienes la url del html, misma que tienes que introducir en OBS:</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<?php 
						
					?>
					<div class="panel-body">
						<div class="col-md-6">

							<?php 
								$reacciones = array();

								if($_POST['iconoliketop']!=''){
									array_push($reacciones, 'likes');
								}
								if($_POST['iconolovetop']!=''){
									array_push($reacciones, 'love');
								}
								if($_POST['iconohahatop']!=''){
									array_push($reacciones, 'haha');
								}
								if($_POST['iconoshocktop']!=''){
									array_push($reacciones, 'shock');
								}
								if($_POST['iconosadtop']!=''){
									array_push($reacciones, 'sad');
								}
								if($_POST['iconoangrytop']!=''){
									array_push($reacciones, 'angry');
								}


								
						
								
								
								$numeroderreacciones = count($reacciones);
								$i = 1;
								/* contadores */
								foreach($reacciones as $r){
									switch($r){
										case "likes":
										$top = $_POST['numeroliketop']*2;
										$outputtextodereacciones .='<div class="tc wf '.$r.' count'.$numeroderreacciones.'_pos'.$i.'" style="margin-top:'.$top.'px"><span class="counter">0</span></div>';
										break;
										case "love":
										$top = $_POST['numerolovetop']*2;
										$outputtextodereacciones .='<div class="tc wf '.$r.' count'.$numeroderreacciones.'_pos'.$i.'" style="margin-top:'.$top.'px"><span class="counter">0</span></div>';
										break;
										case "haha":
										$top = $_POST['numerohahatop']*2;
										$outputtextodereacciones .='<div class="tc wf '.$r.' count'.$numeroderreacciones.'_pos'.$i.'" style="margin-top:'.$top.'px"><span class="counter">0</span></div>';
										break;
										case "shock":
										$top = $_POST['numeroshocktop']*2;
										$outputtextodereacciones .='<div class="tc wf '.$r.' count'.$numeroderreacciones.'_pos'.$i.'" style="margin-top:'.$top.'px"><span class="counter">0</span></div>';
										break;
										case "sad":
										$top = $_POST['numerosadtop']*2;
										$outputtextodereacciones .='<div class="tc wf '.$r.' count'.$numeroderreacciones.'_pos'.$i.'" style="margin-top:'.$top.'px"><span class="counter">0</span></div>';
										break;
										case "angry":
										$top = $_POST['numeroangrytop']*2;
										$outputtextodereacciones .='<div class="tc wf '.$r.' count'.$numeroderreacciones.'_pos'.$i.'" style="margin-top:'.$top.'px"><span class="counter">0</span></div>';
										break;
									}
									$i++;
								}
								$i = 1;
								foreach ($reacciones as $r){
									switch($r){
										case "likes":
										$top = $_POST['iconoliketop']*2;
										$outputtextodereacciones .='<div class="emoji '.$r.' count'.$numeroderreacciones.'_pos'.$i.'" style="margin-top:'.$top.'px"><img src="emojis/like.png"></div>';
										break;
										case "love":
										$top = $_POST['iconolovetop']*2;
										$outputtextodereacciones .='<div class="emoji '.$r.' count'.$numeroderreacciones.'_pos'.$i.'" style="margin-top:'.$top.'px"><img src="emojis/love.png"></div>';
										break;
										case "haha":
										$top = $_POST['iconohahatop']*2;
										$outputtextodereacciones .='<div class="emoji '.$r.' count'.$numeroderreacciones.'_pos'.$i.'" style="margin-top:'.$top.'px"><img src="emojis/haha.png"></div>';
										break;
										case "shock":
										$top = $_POST['iconoshocktop']*2;
										$outputtextodereacciones .='<div class="emoji '.$r.' count'.$numeroderreacciones.'_pos'.$i.'" style="margin-top:'.$top.'px"><img src="emojis/shock.png"></div>';
										break;
										case "sad":
										$top = $_POST['iconosadtop']*2;
										$outputtextodereacciones .='<div class="emoji '.$r.' count'.$numeroderreacciones.'_pos'.$i.'" style="margin-top:'.$top.'px"><img src="emojis/sad.png"></div>';
										break;
										case "angry":
										$top = $_POST['iconoangrytop']*2;
										$outputtextodereacciones .='<div class="emoji '.$r.' count'.$numeroderreacciones.'_pos'.$i.'" style="margin-top:'.$top.'px"><img src="emojis/angry.png"></div>';
										break;
									}
									$i++;
								}
								$html = file_get_contents ( $_POST['rutahtml'] );
								$html = str_replace("|||textodereacciones|||", $outputtextodereacciones, $html);
								$html = str_replace("|||postid|||", $_POST['postid'], $html);
								$fp = fopen($_POST['rutahtml'],"wb");
								fwrite($fp,$html);
								fclose($fp);
								$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
								$rutahtml = $_POST['rutahtml'];
								$actual_link = str_replace("fin.php", $rutahtml, $actual_link);
								?>
								<a href="<?php echo ($actual_link); ?>" target="_blank"><?php echo ($actual_link); ?></a>
								<php
								
							?>
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
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
							$('#iconoliketop').val(position.top);
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
