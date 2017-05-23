<?php 
  include('../Mods/configuracion.php');

	if(isset($_GET['id']))   {
		$id =$_GET['id'];
		
		if ($update_stmt = $cnx->prepare("DELETE FROM `noticias` WHERE idNoticias =?")) {
		            $update_stmt->bind_param('i', $id);         
		            if (! $update_stmt->execute()) {
		                echo "hubo un error";
		            }else{
		                header("Location: index.php?abm=noticias&notice=eliminada");
		            }
		}
	}
    ?>