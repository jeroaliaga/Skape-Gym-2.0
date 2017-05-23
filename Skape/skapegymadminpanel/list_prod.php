<main id='abm'>
		<div>
			<a href="index.php?abm=productos" class='selecc'>Productos</a><a href="index.php?abm=clases" class='noselecc'>Clases</a><a href="index.php?abm=noticias" class='noselecc'>Noticias</a>
		</div>
<h2>Alta, Baja y Modificación de productos.</h2>
	<?php 
	if(isset($_GET["mod"])){
		if($_GET["mod"] == "realizada"){
			echo "<div><p class='modrealizada'>Modificación realizada</p></div>";
		}
	}
	if(isset($_GET["nuevo"])){
		if($_GET["nuevo"] == 'ingresado'){
			echo "<div><p class='modrealizada'>Ingreso correto</p></div>";
		}
	} 
	?>
	<a href="nuevo_producto.php">Agregar nuevo producto</a>
	<table border='1' id="listado-prod">
	<tr>
		<td>Nombre</td>
		<td>Descripción</td>
		<td>Foto</td>
		<td>Precio</td>
		<td>Opciones</td>
	</tr>
	<?php
    
	    $consulta = 'SELECT * FROM productos';
    	$filas = mysqli_query( $cnx, $consulta );
      		
      		while($fila_actual = mysqli_fetch_assoc($filas)){
	     
		        $id = $fila_actual['idProducto'];
		        $nombre = $fila_actual['nombre'];
		        $descripcion = $fila_actual['descripcion'];
		        $precio = $fila_actual['precio'];
		        $imagen = $fila_actual['img'];

		        echo "<tr>";
		        echo "<td>$nombre</td><td>$descripcion</td><td><img src='../$imagen' alt='$nombre'></td><td>$precio</td>";
		        echo "<td><a href='modificar_equipamiento.php?id=$id'>Modificar</a>";
		        echo "<a href='del_prod.php?id=$id'>Eliminar</a></td>";
		        echo "</tr>";

	        }

	?>
	</table>