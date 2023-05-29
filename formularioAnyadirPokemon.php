<?php 
include "includes/header.php";
?>
<html>
<title>Formulario_Añadir_Pokemon</title>
<link rel="stylesheet" type="text/css" href="css/estiloPokedex.css"> 
<body>

<h1>Añadir Pokemon</h1>

<form id="datos" name="formDatos" method="post" action="insertarPokemon.php">
<table align="center" border="1">
	<th>Datos pokemon
    <tr>
      <td>Nº Pokedex</td>
      <td><input type="number" name="num_pokedex" id="num_pokedex" required></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><input type="text" name="nombre" id="nombre" required></td>
    </tr>

    <tr>
      <td>Peso</td>
      <td><input type="number" name="peso" id="peso" step="0.1" required></td>
    </tr>

    <tr>
      <td>Altura</td>
      <td><input type="number" name="altura" id="altura" step="0.1" required></td>
    </tr>
	</th>

	<th>Estadisticas Base
	  <tr>
      <td>Puntos De Salud</td>
      <td><input type="number" name="ps" id="ps" required></td>
    </tr>

	  <tr>
      <td>Ataque</td>
      <td><input type="number" name="ataque" id="ataque" required></td>
    </tr>

	  <tr>
      <td>Defensa</td>
      <td><input type="number" name="defensa" id="defensa" required></td>
    </tr>

	  <tr>
    <td>Especial</td>
      <td><input type="number" name="especial" id="especial" required></td>
    </tr>

	  <tr>
      <td>Velocidad</td>
      <td><input type="number" name="velocidad" id="velocidad" required></td>
    </tr>
	</th>

	  <tr>
		  <td>
			<button type="submit">Añadir Pokemon</button>
		  </td>
	  </tr>
	
</table>
</form>

</body>
</html>

<?php 
include 'includes/footer.php';
?>