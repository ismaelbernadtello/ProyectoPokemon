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


$sqlNumPokedex = 'SELECT numero_pokedex+1 FROM pokemon ORDER BY numero_pokedex DESC LIMIT 1'; //Obtengo el número de la pokedex del último pokemon y lo uso para crear el registro
$numPokedex = mysqli_query($mysqli, $sqlNumPokedex);
$numPokedex = mysqli_fetch_assoc($numPokedex);

$sql = 'INSERT INTO pokemon(numero_pokedex,nombre, altura, peso) VALUES ("'.$numPokedex.'","'.$nombre.'", "'.$altura.'", "'.$peso.'")';
mysqli_query($mysqli, $sql);


// sirve para obtener el número de la pokedex del pokemon que acabamos de crear

$sql2 = 'INSERT INTO estadisticas_base(numero_pokedex, ps, ataque, defensa, especial, velocidad) VALUES ("'.$numPokedex.'", "'.$ps.'", "'.$ataque.'", "'.$defensa.'", "'.$especial.'", "'.$velocidad.'")';
mysqli_query($mysqli, $sql2);

include 'config/cerrarConexion.php';
?>
    </body>
</html>