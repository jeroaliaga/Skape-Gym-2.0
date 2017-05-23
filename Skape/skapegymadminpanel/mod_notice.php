<?php 
  include('../Mods/configuracion.php');

	if(isset($_POST['id']))   {
		$id =$_POST['id'];
		$titulo = $_POST['Titulo'];
		$texto = $_POST['Texto'];
		$video = $_POST['Video'];
		$fecha = $_POST['Fecha'];

		if(isset($_FILES) && $_FILES["Imagen"]["name"] != ""){	
			$foto = $_FILES['Imagen'];
			$tmp = $_FILES['Imagen']['tmp_name'];
			$pun = '../';
			$nombrefoto = 'Imagenes/noticias/foto'.md5($tmp).time().'.jpg';
			$movefoto = $pun.$nombrefoto;
			move_uploaded_file($tmp, $movefoto);

			if ($update_stmt = $cnx->prepare("UPDATE noticias SET Titulo='$titulo',Texto='$texto',Imagen='$nombrefoto',Video='$video',Fecha='$fecha' WHERE idNoticias ='$id' ")) {
		            #$update_stmt->bind_param('issi', $titulo,$texto,$nombrefoto,$id);         
		            if ($update_stmt->execute()) {
		                header("Location: ../skapegymadminpanel/index.php?abm=noticias&mod=realizada");
		            }
			}
		}else if(isset($_FILES) && $_FILES["Imagen"]["name"] == ""){
			if ($update_stmt = $cnx->prepare("UPDATE noticias SET Titulo='$titulo',Texto='$texto',Video='$video',Fecha='$fecha' WHERE idNoticias ='$id' ")) {
		            #$update_stmt->bind_param('issi', $titulo,$texto,$nombrefoto,$id);         
		            if ($update_stmt->execute()) {
		                header("Location: ../skapegymadminpanel/index.php?abm=noticias&mod=realizada");
		            }
			}
		}
    //echo "hay id";

		
	}
    ?>