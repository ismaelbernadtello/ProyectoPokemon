<link rel="stylesheet" type="text/css" href="css/estiloPokedex.css"> 

        <?php
            include 'includes/header.php'; //Incluyo el archivo header.php para que aparezca en la página web, 
            //y así no tener que escribir el código de la cabecera en cada archivo
            include 'config/abrirConexion.php'; //Para evitar escribir siempre el mismo código de conexión a la base de datos, uso el archivo conexion.php

            $numPok = $_GET['numPoke'];

            $sql = "SELECT p.numero_pokedex as num_pokedex, p.imagen, p.nombre, p.peso, p.altura, 
                                                            e.ps, e.ataque, e.defensa, e.especial, e.velocidad,
                                                            t.nombre as nombreTipo
                    FROM pokemon as p
                    INNER JOIN estadisticas_base as e ON p.numero_pokedex = e.numero_pokedex
                    INNER JOIN pokemon_tipo as pt ON p.numero_pokedex = pt.numero_pokedex
                    INNER JOIN tipo as t ON pt.id_tipo = t.id_tipo
                    WHERE  p.numero_pokedex = $numPok";

            $resultado = mysqli_query($mysqli, $sql);
            
            //Calculo el numero de tipos que tiene el pokemon y cuales son
                $NumTipos = "SELECT COUNT(t.nombre) as numTipos
                                FROM pokemon as p
                                INNER JOIN pokemon_tipo as pt ON p.numero_pokedex = pt.numero_pokedex
                                INNER JOIN tipo as t ON pt.id_tipo = t.id_tipo
                                WHERE p.numero_pokedex = $numPok" ;
                $resultadoNumTipos = mysqli_query($mysqli, $NumTipos);
                $filaNumTipos = mysqli_fetch_array($resultadoNumTipos);
                $totalTipos = $filaNumTipos['numTipos'];
                // echo "<h1 class='NombrePokemon'>" . $totalTipos . "</h1>"; Comprobación

                if($filaNumTipos['numTipos'] == 2){
                    $tipo1 = "SELECT t.nombre as nombreTipo
                                FROM pokemon as p
                                INNER JOIN pokemon_tipo as pt ON p.numero_pokedex = pt.numero_pokedex
                                INNER JOIN tipo as t ON pt.id_tipo = t.id_tipo
                                WHERE p.numero_pokedex = $numPok
                                ORDER BY t.nombre ASC
                                LIMIT 1";
                    $resultadoTipo1 = mysqli_query($mysqli, $tipo1);
                    $filaTipo1 = mysqli_fetch_array($resultadoTipo1);
                    $tipo1 = $filaTipo1['nombreTipo'];
                    // echo "<h1 class='NombrePokemon'>" . $tipo1. "</h1>"; Comprobación

                    $tipo2 = "SELECT t.nombre as nombreTipo
                                FROM pokemon as p
                                INNER JOIN pokemon_tipo as pt ON p.numero_pokedex = pt.numero_pokedex
                                INNER JOIN tipo as t ON pt.id_tipo = t.id_tipo
                                WHERE p.numero_pokedex = $numPok
                                ORDER BY t.nombre DESC
                                LIMIT 1";    
                    $resultadoTipo2 = mysqli_query($mysqli, $tipo2);
                    $filaTipo2 = mysqli_fetch_array($resultadoTipo2);
                    $tipo2 = $filaTipo2['nombreTipo'];
                    // echo "<h1 class='NombrePokemon'>" . $tipo2 . "</h1>"; Comprobación
                }
            
            $fila = mysqli_fetch_array($resultado);
                echo "<img src=".$fila['imagen']." class='imagenPokemon'>";
                echo "<h1 class='NombrePokemon'>" . $fila['nombre'] . "</h1>";
                //Si tiene 2 tipos se muestran
                if($totalTipos == 2){ 
                    echo "<h1 class='NombrePokemon'> Tipos: " . $tipo1 ." / " . $tipo2 . "</h1>";
                }
                else{
                    echo "<h1 class='NombrePokemon'> Tipo: " . $fila['nombreTipo'] . "</h1>";
                }
                echo "<table>";
                    echo "<th> Nº Pokedex </th>";
                    echo "<th> Nombre </th>";
                    echo "<th> Peso </th>";
                    echo "<th> Altura </th>";
                    echo "<th> Ps </th>";
                    echo "<th> Ataque </th>";
                    echo "<th> Defensa </th>";
                    echo "<th> Especial </th>";
                    echo "<th> Velocidad </th>";
                    echo "<tr>";
                    echo "<td>" . $fila['num_pokedex'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['peso'] . "</td>";
                    echo "<td>" . $fila['altura'] . "</td>";
                    echo "<td>" . $fila['ps'] . "</td>";
                    echo "<td>" . $fila['ataque'] . "</td>";
                    echo "<td>" . $fila['defensa'] . "</td>";
                    echo "<td>" . $fila['especial'] . "</td>";
                    echo "<td>" . $fila['velocidad'] . "</td>";
                    echo "</tr>";
                echo "</table>";


            include 'config/cerrarConexion.php'; //Cierro la conexion

            include 'includes/footer.php'; //Incluyo el archivo footer.php para que aparezca en la página web, 
            //y así no tener que escribir el código del pie de página en cada archivo
        ?>
    

