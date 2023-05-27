--Sirve para depurar los datos que se insertan en la tabla pokemon, se activa al insertar un pokemon
-- Compruebo si los datos son correctos con el procedimiento depurarDatosPokemon si no lo son, los cambio a valores por defecto

DELIMITER $$
DROP TRIGGER IF EXISTS depurarDatosPokemonInserccion$$
CREATE TRIGGER depurarDatosPokemonInserccion 
BEFORE INSERT
ON pokemon FOR EACH ROW
BEGIN 
	DECLARE numPokedexDepurado INT;
	DECLARE nombreDepurado TEXT;
	DECLARE pesoDepurado DOUBLE;
	DECLARE alturaDepurado DOUBLE;
	
	CALL depurar_datos_insercion_pokemon(NEW.numero_pokedex, NEW.nombre, NEW.peso, NEW.altura,
	numPokedexDepurado, nombreDepurado, pesoDepurado, alturaDepurado);
	SET NEW.numero_pokedex = numPokedexDepurado;
	SET NEW.nombre = nombreDepurado;
	SET NEW.peso = pesoDepurado;
	SET NEW.altura = alturaDepurado;
END $$
DELIMITER ;