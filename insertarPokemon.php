<html>
	<head>
		<title>Insertar Nuevo Pokemon</title>
		<link rel="stylesheet" href="/css/style.css"type="text/css">
	<body>
		
	<?php

include 'config/abrirConexion.php';
$nombre = $_POST['nombre'];
$altura = $_POST['altura'];
$peso = $_POST['peso'];
$ps = $_POST['ps'];
$ataque = $_POST['ataque'];
$defensa = $_POST['defensa'];
$especial = $_POST['especial'];
$velocidad = $_POST['velocidad']; 	



include 'config/cerrarConexion.php';
?>
    </body>
</html>