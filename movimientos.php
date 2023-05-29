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


        // arrays usados para hacer cabezeras clickables para la ordenación por columnas a partir de los arrays
            
        //nombre de las columnas en la BBDD
        $columnas = array("id_movimiento","nombre","potencia","precision_mov","descripcion","pp","prioridad",
                            "tipo","tipo_ataque","probabilidad_efecto_secundario","efecto_secundario");

        //nombre que aparecerá en la página en los th
        $nomColumnas = array("Nº Movimiento", "Nombre Movimiento", "Potencia", "Precisión", "Descripción", "PP", "Prioridad",
                            "Tipo", "Tipo Ataque", "Probabilidad Efecto Secundario", "Efecto Secundario");

        // array usado para elegir que tipo de filtrado se usa
        $tipoFiltrado = array("numero","texto","numero","numero","texto","numero","numero",
                            "texto","texto","numero","texto");
                            //1 Num pokedex, 2 nombre pokemon, 3 peso, 4 altura
        

        $sql = "SELECT m.id_movimiento, m.nombre, m.potencia, m.precision_mov, m.descripcion, m.pp, m.prioridad,
                        t.nombre as tipo,
                        ta.tipo as tipo_ataque,
                        mes.probabilidad as probabilidad_efecto_secundario,
                        es.efecto_secundario as efecto_secundario
                FROM movimiento as m
                        INNER JOIN tipo as t ON m.id_tipo = t.id_tipo
                        INNER JOIN tipo_ataque as ta ON t.id_tipo_ataque = ta.id_tipo_ataque
                        LEFT JOIN movimiento_efecto_secundario as mes ON m.id_movimiento = mes.id_movimiento
                        LEFT JOIN efecto_secundario as es ON mes.id_efecto_secundario = es.id_efecto_secundario"; 

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
            include 'includes/filtroMovimientos.php';

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
                    echo "<td>$filaa</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

        
            include 'config/cerrarConexion.php'; //Cierro la conexion

            include 'includes/footer.php'; //Incluyo el archivo footer.php para que aparezca en la página web, 
            //y así no tener que escribir el código del pie de página en cada archivo
        ?>

