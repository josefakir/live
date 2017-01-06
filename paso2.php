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
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
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
				<h1 class="page-header">Arrastra los conenedores de números y de emojis, para ajustarlos a tu imagen:</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<?php 
						$reacciones = array();
						if(!empty( $_POST['like'])){array_push($reacciones, $_POST['like']);}
						if(!empty( $_POST['love'])){array_push($reacciones, $_POST['love']);}
						if(!empty( $_POST['haha'])){array_push($reacciones, $_POST['haha']);}
						if(!empty( $_POST['shock'])){array_push($reacciones, $_POST['shock']);}
						if(!empty( $_POST['sad'])){array_push($reacciones, $_POST['sad']);}
						if(!empty( $_POST['angry'])){array_push($reacciones, $_POST['angry']);}
						$nombrefolder = date('Y-m-d_H-i-s').strtolower(sanear_string(str_replace(" ", "-", $_POST['nombre'])));
						mkdir("archivo/".$nombrefolder);
						xcopy("emojis","archivo/".$nombrefolder."/emojis");
						xcopy("scripts","archivo/".$nombrefolder);
						$target_path = "archivo/".$nombrefolder."/";
						$target_path = $target_path . basename( $_FILES['foto']['name']); 
						move_uploaded_file($_FILES['foto']['tmp_name'], $target_path);
						$numerodereacciones = count($reacciones);
						$anchoreacciones =  1920/$numerodereacciones;
						/* escribir css */
						$style = "html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}.counter{font-family:'Open Sans',sans-serif;font-size:64px;text-shadow:4px 4px 5px rgba(150,150,150,1)}#wrap{width:1920px;height:1080px;position:relative;background:url(|||imagenBack|||)}.emoji{position:absolute;height:80px}.emoji img{width:80px;margin:0 auto;display:block}.wf{height:64px;position:absolute;text-align:center}.count1_pos1{width:1920px;left:0}.count2_pos1{width:960px;left:0}.count2_pos2{width:960px;left:960px}.count3_pos1{width:640px;left:0}.count3_pos2{width:640px;left:640px}.count3_pos3{width:640px;left:1280px}.count4_pos1{width:480px;left:0}.count4_pos2{width:480px;left:480px}.count4_pos3{width:480px;left:960px}.count4_pos4{width:480px;left:1440px}.count5_pos1{width:384px;left:0}.count5_pos2{width:384px;left:384px}.count5_pos3{width:384px;left:768px}.count5_pos4{width:384px;left:1152px}.count5_pos5{width:384px;left:1536px}.count6_pos1{width:320px;left:0}.count6_pos2{width:320px;left:320px}.count6_pos3{width:320px;left:640px}.count6_pos4{width:320px;left:960px}.count6_pos5{width:320px;left:1280px}.count6_pos6{width:320px;left:1600px}";
						$style = str_replace("|||imagenBack|||", $_FILES['foto']['name'], $style);
						$fp = fopen("archivo/".$nombrefolder."/style.css","wb");
						fwrite($fp,$style);
						fclose($fp);
						/* escribir html */
						$html = '
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reacciones GM</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="wrap">
		|||textodereacciones|||
	</div>
	<script src="jquery.min.js"></script>
	<script src="lodash.min.js"></script>
	<script>
		"use strict";
		var access_token = "368984893278369|J1R7EYA1zxzCyI-rIpYD2lq0Tsw";
		var postID = "|||postid|||"; 
		var refreshTime = 5;
		var defaultCount = 0;

		var reactions = ["LIKE", "LOVE", "WOW", "HAHA", "SAD", "ANGRY"].map(function (e) {
			var code = "reactions_" + e.toLowerCase();
			return "reactions.type(" + e + ").limit(0).summary(total_count).as(" + code + ")"
		}).join(",");

		var	v1 = $(".likes .counter"),
		v2 = $(".love .counter"),
		v3 = $(".sad .counter"),
		v4 = $(".haha .counter"),
		v5 = $(".angry .counter"),
		v6 = $(".shock .counter");

		function refreshCounts() {
			var url = "https://graph.facebook.com/v2.8/?ids=" + postID + "&fields=" + reactions + "&access_token=" + access_token;
			$.getJSON(url, function(res){
				v1.text(defaultCount + res[postID].reactions_like.summary.total_count);
				v2.text(defaultCount + res[postID].reactions_love.summary.total_count);
				v3.text(defaultCount + res[postID].reactions_sad.summary.total_count);
				v4.text(defaultCount + res[postID].reactions_haha.summary.total_count);
				v5.text(defaultCount + res[postID].reactions_angry.summary.total_count);
				v6.text(defaultCount + res[postID].reactions_wow.summary.total_count);
			});
		}

		$(document).ready(function(){
			setInterval(refreshCounts, refreshTime * 1000);
			refreshCounts();
		});
	</script>
</body>
</html>

						';
						$fp = fopen("archivo/".$nombrefolder."/index.html","wb");
						fwrite($fp,$html);
						fclose($fp);
					?>
					<div class="panel-body">
						<div class="col-md-6">
							<div id="dragcontainer" style="background:url(<?php echo $target_path ?>); width: 960px; height: 540px; background-size: cover;cursor:all-scroll;">
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
								<input type="hidden" id="rutahtml" name="rutahtml" value="<?php echo "archivo/".$nombrefolder."/index.html" ?>">
								<input type="hidden" id="anchoreacciones" name="anchoreacciones" value="<?php echo $anchoreacciones ?>">
								<div class="form-group">
									<label>Id de facebook: </label><input type="text" id="postid" name="postid" placeholder="ID DE PUBLICACIÓN EN FB">
								</div>
								<div class="form-group">
									<label for="" id="errorarrastre" style="color: red"></label>
								</div>
								<button type="submit" class="btn btn-primary" id="finalizar">Finalizar</button>
							</form>
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
	<div id="overlay">
		<img src="Loading_icon.gif" alt="">
	</div>
</body>

</html>
