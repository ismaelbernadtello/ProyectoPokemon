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
	<th>Datos básicos
    <tr>
      <td>Nombre</td>
      <td><input type="text" name="nombre" id="nombre"></td>
    </tr>

    <tr>
      <td>Peso</td>
      <td><input type="text" name="peso" id="peso"></td>
    </tr>

    <tr>
      <td>Altura</td>
      <td><input type="text" name="altura" id="altura"></td>
    </tr>
	</th>

	<th>Estadisticas Base
	  <tr>
      <td>Puntos De Salud</td>
      <td><input type="text" name="ps" id="ps"></td>
    </tr>

	  <tr>
      <td>Ataque</td>
      <td><input type="text" name="ataque" id="ataque"></td>
    </tr>

	  <tr>
      <td>Defensa</td>
      <td><input type="text" name="defensa" id="defensa"></td>
    </tr>

	  <tr>
    <td>Especial</td>
      <td><input type="text" name="especial" id="especial"></td>
    </tr>

	  <tr>
      <td>Velocidad</td>
      <td><input type="text" name="velocidad" id="velocidad"></td>
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