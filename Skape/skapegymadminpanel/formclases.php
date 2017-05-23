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
	<h2>Modificar Clase</h2>
        <form action='mod_class.php' method='post' enctype='multipart/form-data'>
          <div><input type='hidden' name='ID' value=<?php echo "'$id'"; ?> /></div>
          <div>Nombre <input type='text'  name='Nombre' value=<?php echo "'$nombre'"; ?> /></div>
          <div>Descripción <textarea cols='50' rows='4' name='Descripcion'><?php echo "$descripcion"; ?></textarea></div>
          <div>Día <select name="Dia" id='dia'>
          				<option value="Lunes" <?php if($dia == 'Lunes'){echo 'selected';} ?>>Lunes</option>
          				<option value="Martes" <?php if($dia == 'Martes'){echo 'selected';} ?>>Martes</option>
          				<option value="Miercoles" <?php if($dia == 'Miercoles'){echo 'selected';} ?>>Miércoles</option>
          				<option value="Jueves" <?php if($dia == 'Jueves'){echo 'selected';} ?>>Jueves</option>
          				<option value="Viernes" <?php if($dia == 'Viernes'){echo 'selected';} ?>>Viernes</option>
          				<option value="Sabado" <?php if($dia == 'Sabado'){echo 'selected';} ?>>Sábado</option>
          				<option value="Domingo" <?php if($dia == 'Domingo'){echo 'selected';} ?>>Domingo</option>
          			</select>
          <div><input type='submit' value='Enviar' /></div>
        </form>
    </main>

<?php include ('../Mods/footer.php'); ?>
</body>
</html>	

