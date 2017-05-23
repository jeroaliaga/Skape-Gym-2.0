<?php 
  include('../Mods/configuracion.php');

		$nombre = $_POST['Nombre'];
		$descripcion = $_POST['Descripcion'];
		$dia = $_POST['Dia'];

		$consulta = "INSERT INTO `clases`(`idClases`, `Nombre`, `Descripcion`, `Dia`) VALUES (NULL,'$nombre','$descripcion', '$dia')";
		$respuesta = mysqli_query( $cnx, $consulta );

		header('Location: index.php?abm=clases&nueva=ingresada');
    ?>