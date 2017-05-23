<main id='abm'>
		<div>
			<a href="index.php?abm=productos" class='noselecc'>Productos</a><a href="index.php?abm=clases" class='noselecc'>Clases</a><a href="index.php?abm=noticias" class='selecc'>Noticias</a>
		</div>
<h2>Alta, Baja y Modificación de Noticias.</h2>
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
	<a href="nueva_noticia.php">Agregar nueva noticia</a>
	<table border='1' id="listado-noticias">
	<tr>
		<td>Título</td>
		<td>Texto</td>
		<td>Imagen</td>
		<td>Video</td>
		<td>Fecha</td>
		<td>Opciones</td>
	</tr>
	<?php
    	
    	$consulta = 'SELECT * FROM noticias';
    	$filas = mysqli_query( $cnx, $consulta );
      		
      		while($fila_actual = mysqli_fetch_assoc($filas)){
		        $id = $fila_actual['idNoticia'];
		        $titulo = $fila_actual['titulo'];
		        $texto = $fila_actual['texto'];
		        $imagen = $fila_actual['imagen'];
		        $video = $fila_actual['video'];
		        $fecha = $fila_actual['fecha'];

		        echo "<tr>";
		        if($imagen != ''){
		        	echo "<td>$titulo</td><td>$texto</td><td><img src='../$imagen'></td><td>$video</td><td>$fecha</td>";
		    	}else{
		    		echo "<td>$titulo</td><td>$texto</td><td></td><td>$video</td><td>$fecha</td>";
		    	}
		        echo "<td><a href='modificar_noticia.php?id=$id'>Modificar</a>";
		        echo "<a href='del_notice.php?id=$id'>Eliminar</a></td>";
		        echo "</tr>";

	      }

	?>
	</table>
</main>