<?php session_start(); ?>
<html>
<head>
	<title>Iniciar sesión</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['Enviar'])) {
	$usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
	$contrasena = mysqli_real_escape_string($mysqli, $_POST['contrasena']);

	if($usuario == "" || $contrasena == "") {
		echo "Cualquier campo de nombre de usuario o contraseña está vacío.";
		echo "<br/>";
		echo "<a href='Acceso.php'>Regresar</a>";
	} else {
		$resultado = mysqli_query($mysqli, "SELECT * FROM acceso WHERE usuario='$usuario' AND contrasena=md5('$contrasena')")
					or die("No se pudo ejecutar la consulta de selección.");
		
		$fila = mysqli_fetch_assoc($resultado);
		
		if(is_array($fila) && !empty($fila)) {
			$validar = $fila['usuario'];
			$_SESSION['validar'] = $validar;
			$_SESSION['nombre'] = $fila['nombre'];
			$_SESSION['id'] = $fila['id'];
		} else {
			echo "Tu usuario o contraseña es inválida.";
			echo "<br/>";
			echo "<a href='Acceso.php'>Regresar</a>";
		}

		if(isset($_SESSION['validar'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Iniciar sesión</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contrasena"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="Enviar" value="Enviar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
