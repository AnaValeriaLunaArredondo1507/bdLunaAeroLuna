<?php session_start(); ?>

<?php
if(!isset($_SESSION['validar'])) {
	header('Location: Acceso.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
//incluyendo el archivo de conexión de la base de datos
include_once("conexion.php");

if(isset($_POST['Agregar'])) {	
	$modelo = $_POST['modelo'];
	$capmal = $_POST['capmal'];
	$idemp = $_POST['IDemp'];
	$cappas = $_POST['cappas'];
	$tipoavion = $_POST['tipoAvion'];
	$pesomax = $_POST['pesmax'];
	$altmax = $_POST['altmax'];
	$IdAcceso = $_SESSION['id'];
		
	// comprobando campos vacíos
	if(empty($modelo) || empty($capmal) || empty($idemp) || empty($cappas) || empty($tipoavion) || empty($pesomax) || empty($altmax)) {				
		
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
		//enlace a la página anterior
		echo "<br/><a href='javascript:self.history.back();'>Regresar</a>";
	} else { 
		
		// si todos los campos están llenos (no vacíos)
		//insertar datos en la base de datos	
		$resultado = mysqli_query($mysqli, "INSERT INTO vuelos( `modelo`, `Capacidad_maletas`, `id_empleado`, `capacidad_pasajeros`, `tipo_avion`, `peso_max`, `altura_max`, `id_acceso`) VALUES('$modelo','$capmal','$idemp','$cappas','$tipoavion','$pesomax','$altmax', '$IdAcceso')");
		
		//mostrar mensaje de éxito
		echo "<font color='green'>Datos agregados exitosamente.";
		echo "<br/><a href='ver.php'>Ver resultados</a>";
	}
}
?>
</body>
</html>
