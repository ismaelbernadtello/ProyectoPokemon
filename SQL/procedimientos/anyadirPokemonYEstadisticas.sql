-- Sirve para insertar pokemons después de haberlo llamado desde el formulario de la página, posteriormente estos datos son depurados por el trigger depurarPokemon
DELIMITER $$

DROP PROCEDURE IF EXISTS insertarPokemon$$
CREATE PROCEDURE insertarPokemon(IN numPokePokemon INT, IN nombrePokemon VARCHAR(15),IN peso DOUBLE,
                                IN altura DOUBLE, IN ps INT, IN ataque INT, IN defensa INT, 
                                IN especial INT, IN velocidad INT)
BEGIN
	INSERT INTO pokemon (numero_pokedex, nombre, peso, altura) VALUES(numPokePokemon, nombrePokemon, peso, altura);
	INSERT INTO estadisticas_base (numero_pokedex, ps, ataque, defensa, especial, velocidad)VALUES (numPokePokemon, ps, ataque, defensa, especial, velocidad);
END $$

DELIMITER ;