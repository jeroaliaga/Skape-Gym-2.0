<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set( "America/Argentina/Buenos_Aires" );



function query( $consulta ){
	global $cnx;
	$respuesta = mysqli_query($cnx, $consulta);
	return $respuesta;
}

$cnx = mysqli_connect('localhost','root','root','skapeGymDBV2');
//$cnx = mysqli_connect('localhost','jero1992','jeronimo1992');
//$con = mysqli_select_db($cnx,'skapegymdb');


?>