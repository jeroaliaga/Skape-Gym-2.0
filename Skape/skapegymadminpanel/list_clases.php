<main id='abm'>
		<div>
			<a href="index.php?abm=productos" class='noselecc'>Productos</a><a href="index.php?abm=clases" class='selecc'>Clases</a><a href="index.php?abm=noticias" class='noselecc'>Noticias</a>
		</div>
<h2>Alta, Baja y Modificación de Clases.</h2>
	<?php 
	if(isset($_GET["mod"])){
		if($_GET["mod"] == "realizada"){
			echo "<div><p class='modrealizada'>Modificación realizada</p></div>";
		} 
	}
	if(isset($_GET["nueva"])){
		if($_GET["nueva"] == 'ingresada'){
			echo "<div><p class='modrealizada'>Ingreso correto</p></div>";
		}
	}
	?>
	<a href="nueva_clase.php">Agregar nueva clase</a>
	<table border='1' id="listado-clases">
	<tr>
		<td>Nombre</td>
		<td>Descripción</td>
		<td>Día</td>
		<td>Opciones</td>
	</tr>
	<?php
    	
    	$consulta = 'SELECT * FROM clases';
    	$filas = mysqli_query( $cnx, $consulta );
      		
      		while($fila_actual = mysqli_fetch_assoc($filas)){
		        $id = $fila_actual['idClases'];
		        $nombre = $fila_actual['Nombre'];
		        $descripcion = $fila_actual['Descripcion'];
		        $dia = $fila_actual['Dia'];

		        echo "<tr>";
		        echo "<td>$nombre</td><td>$descripcion</td><td>$dia</td>";
		        echo "<td><a href='modificar_clases.php?id=$id'>Modificar</a>";
		        echo "<a href='del_class.php?id=$id'>Eliminar</a></td>";
		        echo "</tr>";

	      }

	?>
	</table>
</main>