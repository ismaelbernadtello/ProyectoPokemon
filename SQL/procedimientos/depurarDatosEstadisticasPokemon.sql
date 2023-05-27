-- Sirve para depurar los datos de inserción de estadisticas de pokemons, se llama desde el trigger depurarDatosEstadiscasPokemon
-- Si el numero de pokedex ya existe o es menor a 0, le asigno el siguiente numero de pokedex disponible
-- Si los puntos de salud, ataque, defensa, especial o velocidad son menores que 0, los cambio a 0
DELIMITER $$
DROP PROCEDURE IF EXISTS depurarDatosEstadisticasPokemon$$
CREATE PROCEDURE depurarDatosEstadisticasPokemon( IN numPokedex int, IN ps INT, IN ataque INT, IN defensa INT, 
                                                IN especial INT, IN velocidad INT,
                                                OUT numPokedexDepurado int, OUT psDepurado INT, OUT ataqueDepurado INT, 
                                                OUT defensaDepurado INT, OUT especialDepurado INT, OUT velocidadDepurado INT)
BEGIN
    SET numPokedexDepurado = numPokedex ;
    SET psDepurado = ps ;
    SET ataqueDepurado = ataque ;
    SET defensaDepurado = defensa ;
    SET especialDepurado = especial ;
    SET velocidadDepurado = velocidad ;

    IF numPokedexDepurado IN (SELECT eb.numero_pokedex FROM estadisticas_base eb)  OR numPokedexDepurado < 0 THEN
        SELECT eb.numero_pokedex INTO numPokedexDepurado 
        FROM estadisticas_base eb ORDER BY eb.numero_pokedex DESC LIMIT 1;

        SET numPokedexDepurado = numPokedexDepurado +1;
    END IF;

    IF psDepurado < 0 THEN
        SET psDepurado = 0;
    END IF;

    IF ataqueDepurado < 0 THEN
        SET ataqueDepurado = 0;
    END IF;

    IF defensaDepurado < 0 THEN
        SET defensaDepurado = 0;
    END IF;

    IF especialDepurado < 0 THEN
        SET especialDepurado = 0;
    END IF;

    IF velocidadDepurado < 0 THEN
        SET velocidadDepurado = 0;
    END IF;

END$$
DELIMITER ;