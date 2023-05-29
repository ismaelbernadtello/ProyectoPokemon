<link rel="stylesheet" type="text/css" href="css/estiloPokedex.css"> 
<script>
            function ordenar(orden, asc){
                window.location.replace(window.location.href.split('?')[0] + "?orden=" + orden + "&asc=" + asc);
            }
            
            function filtrar(filtrado, max, min, stringFiltrado){
                window.location.replace(window.location.href.split('?')[0] + "?filtrado=" + filtrado + "&max=" + max + "&min=" + min + "&stringFiltrado=" + stringFiltrado);
            }
            function verPokemon(numPoke){
                window.location.replace("pokemon.php?numPoke=" + numPoke);
            }
</script>

<?php
include 'includes/header.php'; //Incluyo el archivo header.php para que aparezca en la página web, 
                              //y así no tener que escribir el código de la cabecera en cada archivo
include 'config/abrirConexion.php'; //Para evitar escribir siempre el mismo código de conexión a la base de datos, uso el archivo conexion.php


// arrays usados para hacer cabezeras clickeables para la ordenación por columnas de manera procedural a partir de los arrays
        
        //nombre de las columnas en la BBDD
        $columnas = array("num_pokedex","imagen","nombre","peso","altura","ps","ataque","defensa","especial","velocidad");

        //nombre que aparecerá en la página en los th
        $nomColumnas = array("Nº Pokedex", "Imagen", "Pokemon", "Peso", "Altura", "PS", "Ataque", "Defensa", "Especial", "Velocidad");

        // array usado para elegir que tipo de filtrado se usa
        $tipoFiltrado = array("numero","numero","texto", "numero", "numero", "numero", "numero", "numero", "numero", "numero");
                            //1 Num pokedex, 2 nombre pokemon, 3 peso, 4 altura
        
        if($_GET['filtrado']){ //Si se ha filtrado algo, se obtiene el valor de los campos
            $filtrado = $_GET['filtrado'];
            for($i = 0; $i < count($tipoFiltrado); $i++){ //Con count obtengo el número de elementos del array
                if($columnas[$i] == $_GET['filtrado']){ //Si estoy filtrando por la colunmna que pregunto, se realiza el filtrado de esta
                    $tipoFiltroActual = $tipoFiltrado[$i];
                    echo "<script>console.log('$tipoFiltroActual')</script>";
                }
            }

            if($tipoFiltroActual == "numero"){ //si el tipo de filtro es numero, se obtiene el valor de max y min
                $max = $_GET['max'];
                $min = $_GET['min'];
            }
            else{ //Sino es de texto el filtro
                $stringFiltrado = $_GET['stringFiltrado'];
            }
        }

        if($_GET['orden']){ //Si existe la variable de orden, guardo por que columna ordeno en la variable $orden
            $orden = $_GET['orden'];
            if($_GET['asc'] == "true"){ //y si el orden existe es ascendentey sino por defecto es descendente
                $asc = true;
            }
        }
                            //Pongo el as num_pokedex para evitar la ambiguedad
            $sql = "SELECT p.numero_pokedex as num_pokedex, p.imagen, p.nombre, p.peso, p.altura, e.ps, e.ataque, e.defensa, e.especial, e.velocidad
            FROM pokemon as p, estadisticas_base as e WHERE p.numero_pokedex = e.numero_pokedex";

            if($tipoFiltroActual){ //Si existe el tipo de filtro, se realiza el filtrado
                if($tipoFiltroActual == "numero"){ //Si es de tipo número primero se comprueba si existen las variables máximo y mínimo
                                                    //Si no existen se ponen por defecto max=10000 y min=0
                    if(!$max){
                        $max = 10000;
                    }
                    if(!$min){
                        $min = 0;
                    }
                    $sql = $sql . " HAVING $filtrado BETWEEN $min AND $max";
                }
                else //Si no se filtra por número se filtra por texto
                {
                    if($tipoFiltroActual == "texto" && $stringFiltrado != null && $stringFiltrado != ""){
                        $sql = $sql . " HAVING MATCH($filtrado) AGAINST ('$stringFiltrado' IN BOOLEAN MODE)";
                    }
                }
            }

            if($orden){ //Si existe la variable de orden, se ordena por la columna que se ha pasado por la url
                $sql = $sql . " ORDER BY $orden " . ($asc ? "ASC" : "DESC"); //si existen ascendiente se pone ASC y sino DESC
            }

            echo "<script>console.log(\"$sql\")</script>";
            $resultado = mysqli_query($mysqli, $sql);
            //Filtros visibles de la tabla
            include 'includes/filtroPokedex.php';

            //Resultado visible de la tabla
            echo "<table>";
            // este indice es necesario para que todos los arrays estén coordinados
            $indice = 0;
            foreach($columnas as $column){
                echo "<th class='resultados'name='$column' id='$column'
                onclick='ordenar(\"$column\", \"" . ($asc && $orden == $column ? "false" : "true") . "\")'>";
                /*tengo un onclick que llama a la función ordenar, paso la columna y si ya se está ordenando por la columna
                si además se está ordenando ascendentemente, se ordena descendentemente y viceversa*/
                echo $nomColumnas[$indice] . "  ";

                if($orden == $column){ 
                    echo "<img width='17' src='./images/flechaOrderBy" . ($asc ? "ASC" : "DESC") .".png'>";
                    //Cambio las imágenes según el valor de la variable $asc que indica si se ordena ascendentemente o no
                }
                echo "</th>";
                $indice ++;
            }

            //Mientras siga habiendo resultados en la consulta, se crean filas con las columnas con el contenido
            while($fila = mysqli_fetch_assoc($resultado)){ 
                echo "<tr>";
                foreach ($fila as $filaa) {
                    if($filaa == $fila['imagen']){ //Si es la fila de las imágenes meto la imagen en la celda
                        echo "<td onclick='verPokemon(" . $fila['num_pokedex'] . ")'><img src='$filaa' width='100' height='100'></td>";
                    }
                    else{
                        echo "<td onclick='verPokemon(" . $fila['num_pokedex'] . ")'>$filaa</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";

        
            include 'config/cerrarConexion.php'; //Cierro la conexion

            include 'includes/footer.php'; //Incluyo el archivo footer.php para que aparezca en la página web, 
            //y así no tener que escribir el código del pie de página en cada archivo

        ?>

        


