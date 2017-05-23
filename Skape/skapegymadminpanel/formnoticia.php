<!DOCTYPE html>
<?php 
	include('../Mods/arrays.php');
?>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>Skape Gym</title>
	<link rel="stylesheet" href="../Cssyjs/estilos.css" type='text/css'>
	<link rel="stylesheet" href="../Cssyjs/jq.css" type='text/css'>
	<script type='text/javascript' src='../Cssyjs/jquery.1.8.3.min.js'></script>
	<script type='text/javascript' src="../Cssyjs/responsiveslides.min.js"></script>
</head>
<body>
	
<header>
<h1 id="skape"><a href="../index.php">Skape Gym</a></h1>
<nav id="menu">
	<div id='iconos'>
		<a href="#menu" id='abrir'><img src="../Imagenes/menu.png" alt="Menu"></a>
		<a href="#" id='cerrar'><img src="../Imagenes/cerrarmenu.png" alt="Cerrar menu"></a>
	</div>
	<ul id="botones">
		<?php 
			foreach ($botones as $boton => $valor) {
				echo "<li><a href='../index.php?sec=$valor'>$boton</a></li>";
			}
		?>
	</ul>
</nav>
</header>
	<?php 

		if(isset($_GET['sec'])){
			if($_GET['sec'] == 'home'){
				include('contindex.php');
			}else if($_GET['sec'] == 'gimnasio'){
				include('gimnasio.php');
			}else if($_GET['sec'] == 'equipamiento'){
				include('equipamiento.php');
			}else if($_GET['sec'] == 'clases'){
				include('clases.php');
			}else if($_GET['sec'] == 'ingresar'){
				include('ingresar.php');
			}else{
				echo '<main><section><h2>Sección no encontrada</h2><p>La sección '.$_GET['sec'].' a la que desea ingresar no existe.<br><a href="index.php">Volver a la página principal</a></p></section></main>';
			}
		}

	?>
	<main id='form'>
	<h2>Modificar Noticia</h2>
        <form action='mod_notice.php' method='post' enctype='multipart/form-data'>
          <div><input type='hidden' name='id' value=<?php echo "'$id'"; ?> /></div>
          <div>Título <input type='text'  name='Titulo' value=<?php echo "'$titulo'"; ?> /></div>
          <div>Texto <textarea cols='50' rows='4' name='Texto'><?php echo "$texto"; ?></textarea></div>
          <?php
          	if($imagen != ''){
          		echo "<div><img src='../$imagen' alt='$titulo'></div>";
          	}else{
          		echo "<div><p>Imagen</p></div>";
          	}
          ?>
          <div><input type="file" name='Imagen' id='Imagen'></div>
          <div>Video <input type='text'  name='Video' value=<?php echo "'$video'"; ?> /></div>
          <div>Fecha <input type='date'  name='Fecha' value=<?php echo "'$fecha'"; ?> /></div>
          <div><input type='submit' value='Enviar' /></div>
        </form>
    </main>

<?php include ('../Mods/footer.php'); ?>
</body>
</html>	

