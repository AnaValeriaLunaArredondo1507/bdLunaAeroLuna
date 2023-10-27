<?php session_start(); ?>
<html>
<head>
	<title>Inicio de la página</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		¡Bienvenido(a) a Aeroluna!
		<h3>La aerolínea más confiable para tus viajes</h3>
	</div>
	<?php
	if(isset($_SESSION['validar'])) {			
		include("conexion.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM acceso");
	?>
				
		Bienvenido(a) <?php echo $_SESSION['nombre'] ?> ! <a href='CerrarSesion.php'>Cerrar sesión</a><br/>
		<br/>
		<a href='ver.php'>Ver y agregar productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Usted debe estar conectado para ver esta página.<br/><br/>";
		echo "<a href='Acceso.php'>Iniciar sesión</a> | <a href='registro.php'>Registrate</a>";
	}
	?>
	<div id="footer">
		Created by <a href="#" title="Ana Valeria Luna Arredondo">Ana Valeria Luna Arredondo</a>
	</div>
</body>
</html>
