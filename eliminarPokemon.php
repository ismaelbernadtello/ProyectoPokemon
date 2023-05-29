<html>
	<head>
		<title>EliminarPokemon</title>
	<body>
		
	<?php

include 'config/abrirConexion.php';
$numeroPokedex = $_GET['numPokedex'];

//Llamo al procedimiento que elimina el pokemon y sus estadisticas
$delete = "CALL eliminarPokemonYEstadisticas('$numeroPokedex')";

mysqli_query($mysqli, $delete);

//Lo llevo a la pokedex para ver que el pokemon se ha eliminado
echo "<script>window.location.href = 'pokedex.php';</script>";

include 'config/cerrarConexion.php';
?>
    </body>
</html>