<html>
	<head>
		<title>Insertar Nuevo Pokemon</title>
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

$sqlNumPokedex = "SELECT MAX(numero_pokedex)+1 FROM pokemon";
$resultadoNumPokedex = mysqli_query($mysqli, $sql);
$numPokedex = mysqli_fetch_array($resultadoNumPokedex);


	CALL anyadirPokemonYEstadisticas($numPokedex['numero_pokedex'], $altura, $peso, $ps, $ataque, $defensa, $especial, $velocidad);

include 'config/cerrarConexion.php';
?>
    </body>
</html>