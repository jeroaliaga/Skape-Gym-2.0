<?php
	include('../Mods/configuracion.php');

	//var_dump($_POST);
	
	if(isset($_POST)){
	//POST
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$usuario = $_POST['usuario'];
		$mail = $_POST['mail'];
		$pass = $_POST['contrasena'];
		$pass2 = $_POST['contrasena2'];
		$error = '';
		$camposVacios = false;
		//$fechaNacimiento = $_POST['fechaNacimiento'];

		if($nombre == '' || $apellido == '' ||$usuario == '' || $mail == '' || $pass == '' || $pass2 == ''){
			$camposVacios = true;
		}

	//PregUsuario
		$REGusuario = "/^[a-zA-Z0-9]{4,20}$/";
		$Result1 = preg_match($REGusuario, $usuario);

		if($Result1 == false){
			$error .= 'usuario';
		}else{
			$consulta = "SELECT * FROM `usuarios`";
			$respuesta = mysqli_query($cnx, $consulta);

			while($fila_actual = mysqli_fetch_assoc($respuesta)){
				if($fila_actual['usuario'] == $usuario){
					$error .= 'usuarioRegistrado';
				}
			}
		}
	
	//$REGapellido = "/^[a-zA-Z]{2,20}(\s|\s[a-zA-Z]{2,20})*$/";
	
	//Pregmail
		$REGmail = "/^([a-z0-9]{3,}((\_|\-|\.){1,2})?[a-zA-Z0-9]*@[a-zA-Z0-9_-]{3,}\.{1}[a-z]{2,4}(\.[a-zA-Z]{2})?)?$/";
		$Result2 = preg_match($REGmail, $mail);

		if($Result2 == false && $error != ''){
			$error .= '&mail';
		}else if($Result2 == false){
			$error .= 'mail';
		}else{
			$consulta = "SELECT * FROM `usuarios`";
			$respuesta = mysqli_query($cnx, $consulta);

			while($fila_actual = mysqli_fetch_assoc($respuesta)){
				if($fila_actual['mail'] == $mail){
					if($error == ''){
						$error .= 'mailRegistrado';
					}else{
						$error .= '&mailRegistrado';
					}
				}
			}
		}

		$REGpass = "/^[a-zA-Z0-9]{4,10}$/";
		$Result3 = preg_match($REGpass, $pass);

		if($pass != $pass2){
			
			if($error != ''){
				$error .= '&passdif';	
			}else{
				$error .= 'passdif';
			}
			
		}else if($Result3 == false && $error != ''){
			$error .= '&passerror';
		}else{
			$pass = sha1($pass);
		}

		if($error == '' && $camposVacios == false){
			
			$consulta = "INSERT INTO `usuarios`(`idUsuario`, `usuario`, `nombre`, `apellido`, `mail`, `contrasenia`, `recuperarContrasenia`, `rol`, `fechaNacimiento`, `telefono`, `estadoCuenta`) VALUES (NULL,'$usuario','$nombre', '$apellido','$mail', '$pass', NULL, '3', NULL, NULL, '1')";
			$respuesta = mysqli_query($cnx, $consulta);

			header("Location: ../index.php?sec=registro&reg=ok");

		}else{
		
			header("Location: ../index.php?sec=registro&reg=no&$error");

		}

	}

	

?>