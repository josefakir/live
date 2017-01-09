<?php 
	function obtenerRol($id){
		switch ($id) {
			case 1:
			return("Administrador");
			break;
			case 2:
			return("Editor");
			break;
		}
	}
?>