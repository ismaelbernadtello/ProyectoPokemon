<?php 
include "includes/header.php";
$numPokedex = $_GET['numPokedex'];

include 'config/abrirConexion.php';
if($numPokedex){ //Si se viene desde el pokemon la página autocompleta las estadísticas del pokemon y los datos
    $sql = "SELECT p.numero_pokedex , p.nombre , p.peso , p.altura , eb.ps , eb.ataque , eb.defensa , eb.especial , eb.velocidad 
    FROM pokemon p INNER JOIN estadisticas_base as eb ON p.numero_pokedex = eb.numero_pokedex
    WHERE p.numero_pokedex = $numPokedex";

    $resultado = mysqli_query($mysqli, $sql);
    $resultadoConsulta = mysqli_fetch_assoc($resultado);

    if($resultadoConsulta){
        $numeroPokedex = $resultadoConsulta['numero_pokedex'];
        $nombrePokemon = $resultadoConsulta['nombre'];
        $peso = $resultadoConsulta['peso'];
        $altura = $resultadoConsulta['altura'];
        $ps = $resultadoConsulta['ps'];
        $ataque = $resultadoConsulta['ataque'];
        $defensa = $resultadoConsulta['defensa'];
        $especial = $resultadoConsulta['especial'];
        $velocidad = $resultadoConsulta['velocidad'];
    }

    include 'config/cerrarConexion.php';
}
?>

<html>
<title>Formulario_Modificar_Pokemon</title>
<link rel="stylesheet" type="text/css" href="css/estiloPokedex.css"> 
<body>

<h1>Modificar pokemon</h1>

<form id="datos" name="formDatos" method="post" action="modificarPokemon.php">
<table align="center" border="1">
	<th>Datos pokemon
    <tr>
      <td>Nº Pokedex</td>
      <td><input type="number" name="num_pokedex" id="num_pokedex" required <?php if($numeroPokedex){echo "value='$numeroPokedex'";}; ?>></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><input type="text" name="nombre" id="nombre" required <?php if($nombrePokemon){echo "value='$nombrePokemon'";}; ?>></td>
    </tr>

    <tr>
      <td>Peso</td>
      <td><input type="number" name="peso" id="peso" step="0.1" required <?php if($peso){echo "value='$peso'";}; ?> ></td>
    </tr>

    <tr>
      <td>Altura</td>
      <td><input type="number" name="altura" id="altura" step="0.1" required <?php if($altura){echo "value='$altura'";}; ?>></td>
    </tr>
	</th>

	<th>Estadisticas Base
	  <tr>
      <td>Puntos De Salud</td>
      <td><input type="number" name="ps" id="ps" required <?php if($ps){echo "value='$ps'";}; ?>></td>
    </tr>

	  <tr>
      <td>Ataque</td>
      <td><input type="number" name="ataque" id="ataque" required <?php if($ataque){echo "value='$ataque'";}; ?>></td>
    </tr>

	  <tr>
      <td>Defensa</td>
      <td><input type="number" name="defensa" id="defensa" required <?php if($defensa){echo "value='$defensa'";}; ?>></td>
    </tr>

	  <tr>
    <td>Especial</td>
      <td><input type="number" name="especial" id="especial" required <?php if($especial){echo "value='$especial'";}; ?>></td>
    </tr>

	  <tr>
      <td>Velocidad</td>
      <td><input type="number" name="velocidad" id="velocidad" required <?php if($velocidad){echo "value='$velocidad'";}; ?>></td>
    </tr>
	</th>

	  <tr>
		  <td>
			<button type="submit">Modificar Pokemon</button>
		  </td>
	  </tr>
	
</table>
</form>

</body>
</html>
<?php 
include 'includes/footer.php';
?>