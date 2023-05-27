DELIMITER $$
DROP PROCEDURE IF EXISTS insertarImagenesPokemon$$
CREATE PROCEDURE insertarImagenesPokemon ()
    BEGIN
        DECLARE num_Pokemon INT;
        DECLARE terminado INT DEFAULT FALSE; -- Sirve para saber si se termina el bucle porque se han recorrido todas las filas del cursor
        DECLARE cursorImagenes CURSOR FOR SELECT numero_pokedex FROM pokemon;
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET terminado = TRUE; -- Handler para cuando no haya más filas en el cursor

        OPEN cursorImagenes;

        bucle: LOOP
            FETCH cursorImagenes INTO num_Pokemon;
            IF terminado THEN
                LEAVE bucle;
            END IF;
            SELECT insertarImagenPokemon(num_Pokemon); -- Llamada a la función que inserta la imagen del pokemon y así automatizo el proceso
        END LOOP;

        CLOSE cursorImagenes;

    END$$
DELIMITER ;