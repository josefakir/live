<?php 
	error_reporting(E_ALL);
ini_set('display_errors', '1');
	function eliminar($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (is_dir($dir."/".$object))
           eliminar($dir."/".$object);
         else
           unlink($dir."/".$object); 
       } 
     }
     rmdir($dir); 
   } 
 }

 eliminar('archivo/'.$_GET['dir'].'/');
 header("Location: index.php?m=".base64_encode("Eliminado correctamente"));
?>