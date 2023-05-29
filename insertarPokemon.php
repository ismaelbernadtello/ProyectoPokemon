<html>
	<head>
		<title>Insertar Nuevo Pokemon</title>
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

//Llamo al procedimiento que inserta el pokemon y sus estadísticas base
$insert = "CALL anyadirPokemonYEstadisticas($numeroPokemon,'$nombre', $altura, $peso, $ps, $ataque, $defensa, $especial, $velocidad)";

mysqli_query($mysqli, $insert);
//Antes de ejecutarse la inseción se ejecutan 2 triggers que depuran los datos que se introducen tanto en la tabla pokemon como en la tabla estadisticas_base

//Lo llevo a la pokedex para ver el pokemon creado
echo "<script>window.location.href = 'pokedex.php';</script>";

include 'config/cerrarConexion.php';
?>
    </body>
</html>