DELIMITER $$
DROP TRIGGER IF EXISTS depurar_datos_insercion_pokemon$$
CREATE TRIGGER depurar_datos_insercion_pokemon 
AFTER INSERT ON pokemon



DELIMITER ;