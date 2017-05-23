<?php
	include('../Mods/configuracion.php');
	if(isset($_SESSION['nivel'])){
		if($_SESSION['nivel'] === 'root'){
			include('contadmin.php');
		}
	}else{
		header('Location: ../index.php?sec=No encontrada');	
	} 
?>

