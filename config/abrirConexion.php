<?php
//Controlo todo tipo de errores y hago que si ocurre alguno, se muestre en el navegador
function exception_handler(Throwable $exception) {
    echo "Uncaught exception: " , $exception->getMessage(), "\n";
}

//Conexión remota
// $mysqli = mysqli_connect("pokemondb.cfm9djelmdkg.us-east-1.rds.amazonaws.com","admin","adminadmin4312","pokemondb"); //Conecto a la base de datos

//Conexión local
$mysqli = mysqli_connect("172.17.0.2","root","adminadmin","pokemondb");


//echo "conectado a database"; Para comprobar que la conexión se ha realizado correctamente y verlo en el navegador

//La conexión la cierro después de cada consulta en el archivo correspondiente

set_exception_handler('exception_handler');
?>