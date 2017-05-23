<?php 
  include('../Mods/configuracion.php');

	if(isset($_POST['ID']))   {
		$id = $_POST['ID'];
		$nombre = $_POST['Nombre'];
		$descripcion = $_POST['Descripcion'];
		$dia = $_POST['Dia'];

		if ($update_stmt = $cnx->prepare("UPDATE clases SET Nombre='$nombre',Descripcion='$descripcion',Dia='$dia' WHERE idClases='$id'")) {
        
		            if ($update_stmt->execute()) {
		                header("Location: ../skapegymadminpanel/index.php?abm=clases&mod=realizada");
		            }
			}
		
	}
    ?>