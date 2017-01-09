<?php 
	include("auth.php");
	include("funciones.php");
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
				<h1 class="page-header">Reacciones:</h1>
			</div>
		</div><!--/.row-->					
		<div class="row">	
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toggle="table"  data-show-refresh="false" data-show-toggle="false" data-show-columns="false" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="mail" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true" >ID</th>
						        <th data-field="mail" data-sortable="true">Email</th>
						        <th data-field="rol"  data-sortable="true">Rol</th>
						        <th data-field="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
						        <th data-field="delete"><i class="fa fa-trash" aria-hidden="true"></i></th>
						    </tr>
						    </thead>
						    <tbody>
						    	<?php 
						    		$dbh = new PDO("mysql:host=$db_host;dbname=$db_name",$db_user,$db_pass);
									$sql = "SELECT * FROM usuarios order by correo";
								    $q = $dbh->prepare($sql);
								    $q->execute();
								    $result= $q->fetchAll();
								    foreach($result as $r){
								    	?>
								<tr>
						    		<td><?php echo $r['id'] ?></td>
						    		<td><?php echo $r['correo'] ?></td>
						    		<td><?php echo obtenerRol($r['rol']) ?></td>
						    		<td><a href="editar-usuario.php?id=<?php echo $r['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
						    		<td><a href="delete/usuario.php?id=<?php echo $r['id']; ?>" onclick="return confirm('¿Está seguro de eliminar?');" style="color: red"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
						    	</tr>
								    	<?php
								    }
						    	?>
						    </tbody>
						</table>
						<a href="agregar-usuario.php" class="btn btn-primary">Agregar Usuario</a>
					</div>
				</div>
			</div>							
		</div><!--/.row-->
	</div>	<!--/.main-->
	<?php include("scripts.php"); ?>
</body>

</html>
