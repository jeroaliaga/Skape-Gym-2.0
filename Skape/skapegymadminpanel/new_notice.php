<?php 
  include('../Mods/configuracion.php');

	//var_dump($_POST['Fecha']);

		$titulo = $_POST['Titulo'];
		$texto = $_POST['Texto'];
		$video = $_POST['Video'];
		$fecha = $_POST['Fecha'];

		if($fecha == ''){
			$fecha = date("Y-m-d");
		}
		
		if(isset($_FILES['Imagen'])){
			if($_FILES['Imagen']['name'] != ''){		
				$foto = $_FILES['Imagen'];
				$tmp = $_FILES['Imagen']['tmp_name'];
				$pun = '../';
				$nombrefoto = 'Imagenes/noticias/foto'.md5($tmp).time().'.jpg';
				$movefoto = $pun.$nombrefoto;
				move_uploaded_file($tmp, $movefoto);

				$consulta = "INSERT INTO `noticias`(`idNoticias`, `Titulo`, `Texto`, `Imagen`, `Video`, `Fecha`) VALUES (NULL,'$titulo','$texto','$nombrefoto','$video','$fecha')";
				$respuesta = mysqli_query( $cnx, $consulta );

				header('Location: index.php?abm=noticias&nueva=ingresada');
			}else{
				$nombrefoto = '';
				$consulta = "INSERT INTO `noticias`(`idNoticias`, `Titulo`, `Texto`, `Imagen`, `Video`, `Fecha`) VALUES (NULL,'$titulo','$texto','$nombrefoto','$video','$fecha')";
				$respuesta = mysqli_query( $cnx, $consulta );

				header('Location: index.php?abm=noticias&nueva=ingresada');
			}
		}
    ?>