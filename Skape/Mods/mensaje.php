<?php
// POST
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$localidad = $_POST['localidad'];
	$ciudad = $_POST['ciudad'];
	$mensaje = $_POST['mensaje'];
// RegExp
	$REGnombre = "/^[a-zA-Z]{2,20}(\s|\s[a-zA-Z]{2,20})*$/";
	$REGapellido = "/^[a-zA-Z]{2,20}(\s|\s[a-zA-Z]{2,20})*$/";
	$REGemail = "/^([a-z0-9]{3,}((\_|\-|\.){1,2})?[a-zA-Z0-9]*@[a-zA-Z0-9_-]{3,}\.{1}[a-z]{2,4}(\.[a-zA-Z]{2})?)?$/";
	$REGtelefono = "/^((011|11|15)?[0-9]{6,8})?$/";
	$REGciudad = "/^[a-zA-Z]{2,20}(\s|\s[a-zA-Z]{2,20})*$/";
	$REGlocalidad = "/^[a-zA-Z]{2,20}(\s|\s[a-zA-Z]{2,20})*$/";
// Pregs
	$Result1 = preg_match($REGnombre, $nombre);
	$Result2 = preg_match($REGapellido, $apellido);
	$Result3 = preg_match($REGemail, $email);
	$Result4 = preg_match($REGtelefono, $telefono);
	$Result5 = preg_match($REGlocalidad, $localidad);
	$Result6 = preg_match($REGciudad, $ciudad);
// ifs

	$error = "Location: ../index.php?sec=contacto&error=Revise el(los) campo(s) ";
	
		if($Result1 == false){ $error .= 'nombre '; }
		if($Result2 == false){ $error .= 'apellido '; }
		if($Result3 == false){ $error .= 'email '; }
		if($Result4 == false){ $error .= 'telefono '; }
		if($Result5 == false){ $error .= 'localidad '; }
		if($Result6 == false){ $error .= 'ciudad '; }

	if($Result1 == false || $Result2 == false || $Result3 == false || $Result4 == false || $Result5 == false || $Result6 == false){
			header($error);
		}else{
			header('Location: ../index.php?sec=contacto&enviado=si');
		}
			?>






