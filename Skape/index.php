<!DOCTYPE html>
<?php 
	require('Mods/configuracion.php');
	include('Mods/arrays.php');
?>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>Skape Gym</title>
	<link rel="stylesheet" href="Cssyjs/estilos.css" type='text/css'>
	<link rel="stylesheet" href="Cssyjs/jq.css" type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<script type='text/javascript' src='Cssyjs/jquery.1.8.3.min.js'></script>
	<script type='text/javascript' src="Cssyjs/responsiveslides.min.js"></script>

	<script>
    $(function () {
      $("#slider").responsiveSlides({
        auto: false,
        pager: false,
        nav: true,
        speed: 500,
        namespace: "callbacks"
      });

    });
  	</script>
</head>
<body>
	
	<?php require('Mods/botonera.php'); 

		if(isset($_SESSION['nivel'])){
			
			if($_SESSION['nivel'] === 'root'){
				
				echo "<a href='skapegymadminpanel/index.php' class='adminLink'>Admin Panel</a>";

			}

		}

		if(isset($_GET['sec'])){
			if($_GET['sec'] == 'home'){
				include('Mods/contindex.php');
			}else if($_GET['sec'] == 'gimnasio'){
				include('Mods/gimnasio.php');
			}else if($_GET['sec'] == 'equipamiento'){
				include('Mods/equipamiento.php');
			}else if($_GET['sec'] == 'clases'){
				include('Mods/clases.php');
			}else if($_GET['sec'] == 'ingresar'){
				include('Mods/ingresar.php');
			}else if($_GET['sec'] == 'contacto'){
				include('Mods/contacto.php');
			}else if($_GET['sec'] == 'noticia'){
				include('Mods/noticia.php');
			}else if($_GET['sec'] == 'noticias'){
				include('Mods/noticias.php');
			}else if($_GET['sec'] == 'registro'){
				include('Mods/registro.php');
			}else{
				echo "<main class='noenc'><section><h2>Sección no encontrada</h2><p>La sección ".$_GET['sec'].' a la que desea ingresar no existe.<br><a href="index.php">Volver a la página principal</a></p></section></main>';
			}
		}else{
			include('Mods/contindex.php');
		}

	?>

<?php include ('Mods/footer.php'); 
	if(isset($_GET['sec'])){
		if($_GET['sec'] == 'ingresar'){
			echo "<script src='Cssyjs/footerLog.js'></script>";
		}
	}
?>
</body>
</html>
