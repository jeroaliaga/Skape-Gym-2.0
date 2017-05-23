<?php 

	if(isset($_GET['dia'])){

		$diaclases = $_GET['dia'];
		$consulta = "SELECT * FROM clases WHERE Dia = '$diaclases' ORDER BY idClases";
    	$filas = mysqli_query( $cnx, $consulta );

    	echo ("<h2>Clases día $diaclases</h2>");
    	echo ("<a href='index.php?sec=clases'>&#8592; Volver</a>");

      	while($fila_actual = mysqli_fetch_assoc($filas)){
      	
	      	$id = $fila_actual['idClases'];
	        $nombre = $fila_actual['Nombre'];
	        $descripcion = $fila_actual['Descripcion'];
	        $dia = $fila_actual['Dia'];
	        echo "<div><h3>$nombre</h3><p class='descripcion'>$descripcion</p></div>";
    	
    	}

	}

?>