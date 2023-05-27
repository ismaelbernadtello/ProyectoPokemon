

-- Añadir columna imagen a la tabla pokemon
ALTER TABLE pokemon ADD(imagen VARCHAR(100) DEFAULT 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png');


--Creacion de indices
CREATE FULLTEXT INDEX indiceNombrePokemon ON pokemon(nombre); -- Para el filtrado por texto uso este indice con un MATCH AGAINST en la consulta
CREATE FULLTEXT INDEX indiceMovimientosNombre ON movimiento(nombre);
CREATE FULLTEXT INDEX indiceMovimientosDescripcion ON movimiento(descripcion);
CREATE FULLTEXT INDEX indiceNombreTipo ON tipo(nombre);


DELIMITER $$
DROP PROCEDURE IF EXISTS insertar_pokemon$$
CREATE PROCEDURE insertar_pokemon(numPokedex int, nombre text, peso double, altura double)
BEGIN

    INSERT INTO pokemon(numero_pokedex, nombre, peso, altura) VALUES (numPokedex , nombre , peso , altura );

END$$

DELIMITER ;

CALL insertar_pokemon( 200,'sin chan', 50 , 1.20 );
..................................................................................................................................
DELIMITER $$
DROP PROCEDURE IF EXISTS depurar_datos_insercion_pokemon$$
CREATE PROCEDURE depurar_datos_insercion_pokemon( IN numPokedex int, IN nombre text, IN peso double, IN altura double, OUT numPokedexSalida int, OUT nombreSalida text, OUT pesoSalida double, OUT alturaSalida double)
BEGIN
    SET numPokedexSalida = numPokedex ;
    SET nombreSalida = nombre ;
    SET pesoSalida = peso ;
    SET alturaSalida = altura ;
    IF numPokedexSalida IN (SELECT p.numero_pokedex FROM pokemon p)  OR numPokedexSalida < 0 THEN
        SET numPokedexSalida = null;
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