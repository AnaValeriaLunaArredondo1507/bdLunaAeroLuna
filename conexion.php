<?php

/**
* mysql_connect está en desuso
* usando mysqli_connect en su lugar
 */

$Localhost = 'localhost';
$basededatosNombre = 'bd_aeroluna_luna';
$basededatosUsuario = 'root';
$basededatosContrasena = '';

$mysqli = mysqli_connect($Localhost, $basededatosUsuario, $basededatosContrasena, $basededatosNombre); 
	
?>
