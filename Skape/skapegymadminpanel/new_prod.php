<?php 
  include('../Mods/configuracion.php');

		$nombre = $_POST['Nombre'];
		$descripcion = $_POST['Descripcion'];
		$precio = $_POST['Precio'];
		$foto = $_FILES['Imagen'];
		$tmp = $_FILES['Imagen']['tmp_name'];
		$pun = '../';
		$nombrefoto = 'Imagenes/secciones/equipamiento/foto'.md5($tmp).time().'.jpg';
		$movefoto = $pun.$nombrefoto;
		move_uploaded_file($tmp, $movefoto);

		$consulta = "INSERT INTO `productos`(`idProductos`, `Nombre`, `Descripcion`, `Imagen`, `Precio`) VALUES (NULL,'$nombre','$descripcion','$nombrefoto','$precio')";
		$respuesta = mysqli_query( $cnx, $consulta );

		header('Location: index.php?abm=productos&nuevo=ingresado');
    ?>