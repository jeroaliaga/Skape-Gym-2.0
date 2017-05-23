<!DOCTYPE html>
<?php 
	include('arrays.php');
?>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>Skape Gym</title>
	<link rel="stylesheet" href="../Cssyjs/estilos.css" type='text/css'>
	<link rel="stylesheet" href="../Cssyjs/jq.css" type='text/css'>
</head>
<body>
	
	<?php require('botonera.php');?>
		
		<?php 

			if(isset($_GET['abm'])){
				if($_GET['abm']  == "productos"){
					include("list_prod.php");
				}else if($_GET['abm'] == "clases"){
					include ("list_clases.php");
				}else if($_GET['abm'] == "noticias"){
					include ("list_notices.php");
				}
			}else{
				include("list_prod.php");
			}

		?>

	<?php include('footer.php'); ?>
</body>
</html>