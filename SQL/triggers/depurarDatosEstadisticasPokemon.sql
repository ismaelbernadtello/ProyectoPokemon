-- Sirve para depurar los datos que se insertan en la tabla estadisticas_base, se activa al insertar una estadistica
-- Usa el trigger depurarDatosEstadisticasPokemon para depurar los datos de la estadistica
DELIMITER $$
DROP TRIGGER IF EXISTS depurarDatosEstadisticasInsercion$$
CREATE TRIGGER depurarDatosEstadisticasInsercion 
BEFORE INSERT
ON estadisticas_base FOR EACH ROW
BEGIN 
	DECLARE numPokedexDepurado INT;
	DECLARE psDepurado INT;
	DECLARE ataqueDepurado INT;
	DECLARE defensaDepurado INT;
	DECLARE especialDepurado INT;
	DECLARE velocidadDepurado INT;
	CALL depurarDatosEstadisticasPokemon(NEW.numero_pokedex, NEW.ps, NEW.ataque, NEW.defensa, NEW.especial, NEW.velocidad,
	numPokedexDepurado, psDepurado, ataqueDepurado, defensaDepurado, especialDepurado, velocidadDepurado); 
	SET NEW.numero_pokedex = numPokedexDepurado;
	SET NEW.ps = psDepurado;
	SET NEW.ataque = ataqueDepurado;
	SET NEW.defensa = defensaDepurado;
	SET NEW.especial = especialDepurado;
	SET NEW.velocidad = velocidadDepurado;
END $$
DELIMITER ;