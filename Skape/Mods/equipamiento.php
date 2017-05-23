<?php 
	$consulta = "SELECT * FROM productos ORDER BY idProducto";
?>
<main id='equipo'>
	<h2>Equipamiento</h2>
	<p>Encuentra todo el equipo que necesitas para entrenar en tu propia casa:</p>
	<?php
  
    //$resultado = $cnx->query($consulta);
    $respuesta = mysqli_query( $cnx, $consulta );

      while($fila_actual = mysqli_fetch_assoc($respuesta)){
      	$id = $fila_actual['idProducto'];
        $nombre = $fila_actual['nombre'];
        $img = $fila_actual['img'];
        $descripcion = $fila_actual['descripcion'];
        $precio = $fila_actual['precio'];
        echo "<div><img src='$img' alt='$nombre'><h3>$nombre</h3><p class='descripcion'>$descripcion</p><p>".'$'."$precio</p></div>";
     }
  ?>
</main>