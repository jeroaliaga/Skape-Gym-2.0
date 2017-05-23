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
	<h2>Nueva Clase</h2>
        <form action='new_class.php' method='post' enctype='multipart/form-data'>
          <div>Nombre<input type='text'  name='Nombre' /></div>
          <div>Descripción<textarea cols='50' rows='4' name='Descripcion'></textarea></div>
          <div>Día</div>
          <div>
          <select name="Dia" id="dia">
          		<option value="Lunes">Lunes</option>
          		<option value="Martes">Martes</option>
          		<option value="Miercoles">Miércoles</option>
          		<option value="Jueves">Jueves</option>
          		<option value="Viernes">Viernes</option>
          		<option value="Sabado">Sábado</option>
          		<option value="Domingo">Domingo</option>
          </select>
          </div>
          <div><input type='submit' value='Mandar' /></div>
        </form>
    </main>
    <footer id='footer'>
	<h3>Skape Gym</h3>
	<ul>
		<li>&copy; Todos los derechos reservados</li>
		<li><a href="#">Información</a></li>
		<li>Powered by <a href="http://www.graphtoolsdesign.com">GraphTools Design</a></li>
		<li class='contacto'><a href="../index.php?sec=contacto">Contacto</a></li>
	</ul>
</footer>
</body>
</html>	

