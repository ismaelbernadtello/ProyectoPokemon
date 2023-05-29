<html>
	<head>
		<title>ModificarPokemon</title>
	<body>
		
	<?php

include 'config/abrirConexion.php';
$numeroPokemon = $_POST['num_pokedex'];
$nombre = $_POST['nombre'];
$altura = $_POST['altura'];
$peso = $_POST['peso'];
$ps = $_POST['ps'];
$ataque = $_POST['ataque'];
$defensa = $_POST['defensa'];
$especial = $_POST['especial'];
$velocidad = $_POST['velocidad']; 	

//Llamo al procedimiento que modifica el pokemon y sus estadísticas base
$update = "CALL modificarPokemonYEstadisticas($numeroPokemon,'$nombre', $altura, $peso, $ps, $ataque, $defensa, $especial, $velocidad)";

mysqli_query($mysqli, $update);

//Lo llevo a la pokedex para ver el pokemon modificado
echo "<script>window.location.href = 'pokedex.php';</script>";

include 'config/cerrarConexion.php';
?>
    </body>
</html>