<?php
	include('configuracion.php');

	$usuario = $_POST['usuario'];
	$pass = $_POST['pass'];

	$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasenia = SHA1('$pass') OR mail = '$usuario' AND contrasenia = SHA1('$pass')";
	$respuesta = mysqli_query($cnx, $consulta);
	$fila = mysqli_fetch_assoc($respuesta);

	if($fila){

		$_SESSION['user'] = $fila['usuario'];

		switch($fila['rol']){
						
			case '1':
				$_SESSION['nivel'] = 'root';
				header('Location:../index.php');
				break;
			case '2':
				$_SESSION['nivel'] = 'profesor';
				header('Location:../index.php');
				break;
			case '3':
				$_SESSION['nivel'] = 'user';
				header('Location:../index.php');
				break;
			case '4':
				$_SESSION['nivel'] = 'normal';
				header('Location:../index.php');
				break;

		}

	}else if($usuario == '' && $pass == '' || $usuario == '' || $pass == ''){

		header('Location:../index.php?sec=ingresar&camposvacios=true');

	}else{

		header('Location:../index.php?sec=ingresar&ingresoinvalido=true');

	}



		
/*

if($usuario == '' && $pass == ''){
			
		header('Location:../index.php?sec=ingresar&ingresoinvalido=true');

	}else{
		
		while($fila_actual = mysqli_fetch_assoc($respuesta)){
			
			if($usuario === '' || $pass === ''){

				header('Location:../index.php?sec=ingresar&ingresoinvalido=true');

			}else if($fila_actual['usuario'] == $usuario || $fila_actual['mail'] == $usuario){

				$passDB = $fila_actual['contrasenia'];
				$pass = sha1($pass);

				if($passDB == $pass){

					$_SESSION['user'] = $fila_actual['usuario'];

					switch($fila_actual['rol']){
						
						case '1':
							$_SESSION['nivel'] = 'root';
							header('Location:../index.php');
							break;
						case '2':
							$_SESSION['nivel'] = 'profesor';
							header('Location:../index.php');
							break;
						case '3':
							$_SESSION['nivel'] = 'user';
							header('Location:../index.php');
							break;
						case '4':
							$_SESSION['nivel'] = 'normal';
							header('Location:../index.php');
							break;

				}

			}else{

					header('Location:../index.php?sec=ingresar&ingresoinvalido=true');

			}

			}else{

				header('Location:../index.php?sec=ingresar&ingresoinvalido=true');				

			}

		}	

	}


*/
?>