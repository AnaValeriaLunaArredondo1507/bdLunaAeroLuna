<?php session_start(); ?>

<?php
if(!isset($_SESSION['validar'])) {
	header('Location: Acceso.php');
}
?>

<?php
//incluyendo el archivo de conexión de la base de datos
include_once("conexion.php");

//Obteniendo datos en orden descendente (la última entrada primero)
$result = mysqli_query($mysqli, "SELECT * FROM vuelos WHERE id_acceso=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Inicio de página</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar nuevos datos</a> | <a href="CerrarSesion.php">Cerrar sesión</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>ID avión</td>
			<td>Modelo</td>
			<td>Capacidad maletas</td>
			<td>ID empleado</td>
			<td>Capacidad pasajeros</td>
			<td>Tipo avión</td>
			<td>Peso máximo</td>
			<td>Altura máxima</td>
			<td>Agregar</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			$id=$res['id'];
			echo "<td>".$id."</td>";
			echo "<td>".$res['modelo']."</td>";
			echo "<td>".$res['Capacidad_maletas']."</td>";
			echo "<td>".$res['id_empleado']."</td>";
			echo "<td>".$res['capacidad_pasajeros']."</td>";
			echo "<td>".$res['tipo_avion']."</td>";
			echo "<td>".$res['peso_max']."</td>";
			echo "<td>".$res['altura_max']."</td>";
			echo "<td><a href=\"editar.php?id='$id'\">Editar</a> | <a href=\"eliminar.php?id='$id'\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
