<?php 
  include('../Mods/configuracion.php');

	if(isset($_POST['ID']))   {
		$id =$_POST['ID'];
		$nombre = $_POST['Nombre'];
		$descripcion = $_POST['Descripcion'];

		if(isset($_FILES) && $_FILES["Imagen"]["name"] != ""){	
			$foto = $_FILES['Imagen'];
			$tmp = $_FILES['Imagen']['tmp_name'];
			$pun = '../';
			$nombrefoto = 'Imagenes/secciones/equipamiento/foto'.md5($tmp).time().'.jpg';
			$movefoto = $pun.$nombrefoto;
			move_uploaded_file($tmp, $movefoto);

			if ($update_stmt = $cnx->prepare("UPDATE productos SET Nombre='$nombre',Descripcion='$descripcion',Imagen='$nombrefoto' WHERE idProductos ='$id' ")) {
		            #$update_stmt->bind_param('issi', $nombre,$descripcion,$nombrefoto,$id);         
		            if ($update_stmt->execute()) {
		                header("Location: ../skapegymadminpanel/index.php?abm=productos&mod=realizada");
		            }
			}
		}else if(isset($_FILES) && $_FILES["Imagen"]["name"] == ""){
			if ($update_stmt = $cnx->prepare("UPDATE productos SET Nombre='$nombre',Descripcion='$descripcion' WHERE idProductos ='$id' ")) {
		            #$update_stmt->bind_param('issi', $nombre,$descripcion,$nombrefoto,$id);         
		            if ($update_stmt->execute()) {
		                header("Location: ../skapegymadminpanel/index.php?abm=productos&mod=realizada");
		            }
			}
		}
    //echo "hay id";

		
	}
    ?>