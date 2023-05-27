DELIMITER $$
DROP PROCEDURE IF EXISTS anyadirPokemon$$
CREATE PROCEDURE anyadirPokemon(IN numPokedex int, IN nombre text,IN peso double,IN altura double, )
BEGIN
    CALL
    INSERT INTO pokemon(numero_pokedex, nombre, peso, altura) VALUES (numPokedex , nombre , peso , altura);
    CALL insertarImagenPokemon(numPokedex); -- Inserto la imagen del pokemon que corresponde a su número de pokedex	

END$$

DELIMITER ;

CALL insertar_pokemon( 200,'sin chan', 50 , 1.20 );