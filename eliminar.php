<?php session_start(); ?>

<?php
if(!isset($_SESSION['validar'])) {
	header('Location: Acceso.php');
}
?>

<?php
//incluyendo el archivo de conexión de la base de datos
include("conexion.php");

//obteniendo la identificación de los datos de la URL
$id = $_GET['id'];

//eliminando la fila de la tabla
$resultado=mysqli_query($mysqli, "DELETE FROM vuelos WHERE id=$id");

//redirigir a la página de visualización (ver.php en nuestro caso)
header("Location:ver.php");
?>

