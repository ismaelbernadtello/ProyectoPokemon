<link rel="stylesheet" type="text/css" href="css/estiloPokedex.css"> 
<html>
    <nav class="menuFiltros">
        <table >
            <th>Elige un campo por el que filtrar</th><th>Filtro por número(si el campo es numérico)</th><th>Filtro de texto</th>
            <tr>
                <td>
                    <select name="selecionFiltro" id="selecionFiltro">
                        <option selected disabled> Elige un campo para realizar el filtrado:</option>
                            <?php //Muestro las opciones con los nombres de los campos. El value es el nombre de la columna en la BBDD y se ve Nª Pokedex por ejemplo
                                for($i = 0; $i < count($columnas); $i++){
                                    echo "<option value='$columnas[$i]'>$nomColumnas[$i] ($tipoFiltrado[$i])</option>";
                                }
                            ?>
                    </select>
                </td>
                <td>
                    <label for="valorMinimo">Valor mínimo: </label>
                    <input type="number" name="valorMinimo" id="valorMinimo">

                    <label for="valorMaximo">Valor máximo: </label>
                    <input type="number" name="valorMaximo" id="valorMaximo">
                </td>
                <td>
                <label for="inputNombre">Texto: </label>
                <input type="text" name="inputNombre" id="inputNombre" maxlenght="25">
                <button onclick="filtrar(selecionFiltro.value, valorMaximo.value, valorMinimo.value, inputNombre.value)">Filtrar</button>
                </td>
            </tr>
        </table>
    </nav>
</html>