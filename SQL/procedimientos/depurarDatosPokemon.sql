DELIMITER $$
DROP PROCEDURE IF EXISTS depurar_datos_insercion_pokemon$$
CREATE PROCEDURE depurar_datos_insercion_pokemon( IN numPokedex int, IN nombre text, IN peso double, IN altura double, OUT numPokedexSalida int, OUT nombreSalida text, OUT pesoSalida double, OUT alturaSalida double)
BEGIN
    SET numPokedexSalida = numPokedex ;
    SET nombreSalida = nombre ;
    SET pesoSalida = peso ;
    SET alturaSalida = altura ;

    -- Pregunto si el número de pokedex es menor que 0 o si ya existe en la base de datos
    IF numPokedexSalida IN (SELECT p.numero_pokedex FROM pokemon p)  OR numPokedexSalida < 0 THEN
        SET numPokedexSalida = (SELECT p. FROM pokemon p ORDER BY p.numero_pokedex DESC LIMIT 1) + 1;
    END IF;

    SET nombreSalida = TRIM(nombreSalida);
    IF LENGTH(nombreSalida) > 15 THEN
        SET nombreSalida = LEFT(nombreSalida, 15);
    END IF;

    IF pesoSalida < 0 THEN
        SET pesoSalida = 0;
    END IF;

    IF alturaSalida < 0 THEN
        SET alturaSalida = 0;
    END IF;

END$$
DELIMITER ;
CALL depurar_datos_insercion_pokemon(2,'untupotumptetoasn', -50 , -1, @hola, @adios, @holi, @chao);
SELECT @hola, @adios, @holi, @chao;