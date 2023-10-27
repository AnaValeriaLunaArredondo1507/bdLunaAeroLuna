<?php session_start(); ?>

<?php
if(!isset($_SESSION['validar'])) {
	header('Location: Acceso.php');
}
?>

<?php
// incluir la conexión a la base de datos
include_once("conexion.php");

if(isset($_POST['Editar']))
{	
	$id = $_POST['id'];
	$modelo = $_POST['modelo'];
	$capmal = $_POST['capmal'];
	$idemp = $_POST['IDemp'];
	$cappas = $_POST['cappas'];
	$tipoavion = $_POST['tipoAvion'];
	$pesomax = $_POST['pesmax'];
	$altmax = $_POST['altmax'];
	
	// comprobando campos vacíos
	if(empty($id) || empty($modelo) || empty($capmal) || empty($idemp) || empty($cappas) || empty($tipoavion) || empty($pesomax) || empty($altmax)) {				
		if(empty($id)) {
			echo "<font color='red'>El campo de ID del avión está vacío.</font><br/>";
		}
		
		if(empty($modelo)) {
			echo "<font color='red'>El campo de modelo está vacío.</font><br/>";
		}
		
		if(empty($capmal)) {
			echo "<font color='red'>El campo de capacidad de maletas está vacío.</font><br/>";
		}
		if(empty($idemp)) {
			echo "<font color='red'>El campo de ID del empleado está vacío.</font><br/>";
		}
		
		if(empty($cappas)) {
			echo "<font color='red'>El campo de capacidad de pasajeros está vacío.</font><br/>";
		}
		
		if(empty($tipoavion)) {
			echo "<font color='red'>El campo de tipo de avión está vacío.</font><br/>";
		}
		if(empty($pesomax)) {
			echo "<font color='red'>El campo de peso máximo está vacío.</font><br/>";
		}
		if(empty($altmax)) {
			echo "<font color='red'>El campo de altura máxima está vacío.</font><br/>";
		}		
	} else {	
		//actualizando la tabla
		$result = mysqli_query($mysqli, "UPDATE `vuelos` SET `modelo`='$modelo',`Capacidad_maletas`='$capmal',`id_empleado`='$idemp',`capacidad_pasajeros`='$cappas',`tipo_avion`='$tipoavion',`peso_max`='$pesomax',`altura_max`='$altmax' WHERE id='$id'");
		
		//redirigiendo a la página de visualización. En nuestro caso, es ver.php
		header("Location: ver.php");
	}
}
?>
<?php
//obteniendo identificación de la URL
$id = $_GET['id'];

//seleccionar datos asociados con esta identificación en particular
$resultado = mysqli_query($mysqli, "SELECT * FROM vuelos WHERE id=$id");

while($res = mysqli_fetch_array($resultado))
{
	$modelo = $res['modelo'];
	$capmal = $res['Capacidad_maletas'];
	$idemp = $res['id_empleado'];
	$cappas = $res['capacidad_pasajeros'];
	$tipoavion = $res['tipo_avion'];
	$pesomax = $res['peso_max'];
	$altmax = $res['altura_max'];
}
?>
<html>
<head>	
	<title>Editar datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver productos</a> | <a href="CerrarSesion.php">Cerrar Sesión</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>Modelo:</td>
				<td><input type="text" name="modelo" value="<?php echo $modelo; ?>"></td>
			</tr>
			<tr> 
				<td>Capacidad de maletas:</td>
				<td><input type="text" name="capmal" value="<?php echo $capmal; ?>"></td>
			</tr>
			<tr> 
				<td>ID del empleado:</td>
				<td><input type="text" name="IDemp" value="<?php echo $idemp; ?>"></td>
			</tr>
			<tr> 
				<td>Capacidad de pasajeros:</td>
				<td><input type="text" name="cappas" value="<?php echo $cappas; ?>"></td>
			</tr>
			<tr> 
				<td>Tipo de avión:</td>
				<td><input type="text" name="tipoAvion" value="<?php echo $tipoavion; ?>"></td>
			</tr>
			<tr> 
				<td>Peso máximo:</td>
				<td><input type="text" name="pesmax" value="<?php echo $pesomax; ?>"></td>
			</tr>
			<tr> 
				<td>Altura máxima:</td>
				<td><input type="text" name="altmax" value="<?php echo $altmax; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id;?>></td>
				<td><input type="submit" name="Editar" value="Editar"></td>
			</tr>
		</table>
	</form>
</body>
</html>