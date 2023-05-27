-- Sirve para depurar los datos de inserción de pokemons, se llama desde el trigger depurarDatosEstadisticasPokemon
-- Compruebo si los datos son correctos, si no lo son, los cambio a valores por defecto
-- Si el numero de pokedex ya existe o es menor a 0, le asigno el siguiente numero de pokedex disponible
-- Si el nombre es mayor de 15 caracteres, lo recorto a 15 caracteres
-- Si el peso o la altura son menores que 0, los cambio a 0
-- Si el nombre tiene espacios en blanco al principio o al final, los elimino con TRIM
DELIMITER $$
DROP PROCEDURE IF EXISTS depurar_datos_insercion_pokemon$$
CREATE PROCEDURE depurar_datos_insercion_pokemon(IN numPokedex int, IN nombre text, IN peso double,
                                                IN altura double, OUT numeroPokedex int, OUT nombrePokemon text, 
                                                OUT pesoPokemon double, OUT alturaPokemon double)
BEGIN
    SET numeroPokedex = numPokedex ;
    SET nombrePokemon = nombre ;
    SET pesoPokemon = peso ;
    SET alturaPokemon = altura ;
    IF numeroPokedex IN (SELECT p.numero_pokedex FROM pokemon p)  OR numeroPokedex < 0 THEN
        SELECT p.numero_pokedex INTO numeroPokedex FROM pokemon p ORDER BY p.numero_pokedex DESC LIMIT 1;
        SET numeroPokedex = numeroPokedex +1;
    END IF;

    SET nombrePokemon = TRIM(nombrePokemon);
    IF LENGTH(nombrePokemon) > 15 THEN
        SET nombrePokemon = LEFT(nombrePokemon, 15);
    END IF;

    IF pesoPokemon < 0 THEN
        SET pesoPokemon = 0;
    END IF;

    IF alturaPokemon < 0 THEN
        SET alturaPokemon = 0;
    END IF;

END$$
DELIMITER ;