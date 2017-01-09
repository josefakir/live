<?php 
	include("../config.php");
	$id = $_GET['id'];
	$dbh = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
	$sql = "SELECT * FROM reacciones WHERE id = :id ";
    $q = $dbh->prepare($sql);
    $q->execute(array(
    	':id' => $id,
    )
    );
    $r= $q->fetch();
    $rbd = $r;
    $postfacebook = $r['id_fb'];
    $reacciones = array();
    if($r['likes']!="0|0"){array_push($reacciones, array('tipo' => 'like', 'valor' =>$r['likes']));}
    if($r['love']!="0|0"){array_push($reacciones, array('tipo' => 'love', 'valor' =>$r['love']));}
    if($r['haha']!="0|0"){array_push($reacciones, array('tipo' => 'haha', 'valor' =>$r['haha']));}
    if($r['wow']!="0|0"){array_push($reacciones, array('tipo' => 'wow', 'valor' =>$r['wow']));}
    if($r['sad']!="0|0"){array_push($reacciones, array('tipo' => 'sad', 'valor' =>$r['sad']));}
    if($r['angry']!="0|0"){array_push($reacciones, array('tipo' => 'angry', 'valor' =>$r['angry']));}
    $cantidadreacciones = count($reacciones);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Live Reactions Generator</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="wrap" style="background: url(../<?php echo $r['imagen'] ?>);">
		<?php 
			$i = 1;
			foreach($reacciones as $r){
				$tiponum = explode("|", $r['valor']);
				$icono = $tiponum[0];
				$contador = $tiponum[1];
				$tipo = $r['tipo'];
				if ($tipo=="wow"){
					$tipo = 'shock';
				}
				//print_R($r);
				?>
		<div class="tc wf <?php echo $tipo ?> count<?php echo $cantidadreacciones ?>_pos<?php echo $i ?>" style="margin-top:<?php echo $contador ?>px"><span class="counter" style="color:<?php echo $rbd['color'] ?>">0</span></div>
				<?php
				$i++;
			}
			$i = 1;
			foreach($reacciones as $r){
				$tiponum = explode("|", $r['valor']);
				$icono = $tiponum[0];
				$contador = $tiponum[1];
				$tipo = $r['tipo'];
				if ($tipo=="wow"){
					$tipo = 'shock';
				}
				?>
		<div class="emoji <?php echo $tipo ?> <?php echo $r['tipo'] ?> count<?php echo $cantidadreacciones ?>_pos<?php echo $i ?>" style="margin-top:<?php echo $icono ?>px"><img src="emojis/<?php echo $tipo ?>.png"></div>
				<?php
				$i++;
			}
		?>

		<!--<div class="tc wf love count4_pos1" style="margin-top:232px"><span class="counter">0</span></div>
		<div class="tc wf haha count4_pos2" style="margin-top:232px"><span class="counter">0</span></div>
		<div class="tc wf shock count4_pos3" style="margin-top:232px"><span class="counter">0</span></div>
		<div class="tc wf sad count4_pos4" style="margin-top:232px"><span class="counter">0</span></div>
		<div class="emoji love count4_pos1" style="margin-top:152px"><img src="emojis/love.png"></div>
		<div class="emoji haha count4_pos2" style="margin-top:152px"><img src="emojis/haha.png"></div>
		<div class="emoji shock count4_pos3" style="margin-top:152px"><img src="emojis/shock.png"></div>
		<div class="emoji sad count4_pos4" style="margin-top:152px"><img src="emojis/sad.png"></div>-->
	</div>
	<script src="jquery.min.js"></script>
	<script src="lodash.min.js"></script>
	<script>
		"use strict";
		var access_token = "368984893278369|J1R7EYA1zxzCyI-rIpYD2lq0Tsw";
		var postID = "<?php echo $postfacebook ?>"; 
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

						