DELIMITER $$

DROP PROCEDURE IF EXISTS modificarPokemonYEstadisticas$$
CREATE PROCEDURE modificarPokemonYEstadisticas(IN numeroPokedex INT, IN nombreModificado VARCHAR(15),IN pesoModificado DOUBLE,
                                                IN alturaModificado DOUBLE, IN psModificado INT, IN ataqueModificado INT, IN defensaModificado INT, 
                                                IN especialModificado INT, IN velocidadModificado INT)
BEGIN
    -- Actualizo los datos de la tabla pokemon
    UPDATE pokemon 
    SET nombre = nombreModificado, 
        peso = pesoModificado, 
        altura = alturaModificado
    WHERE numero_pokedex = numeroPokedex;

    -- Actualizo los datos de la tabla estadisticas_base
    UPDATE estadisticas_base 
    SET ps = psModificado, 
        ataque = ataqueModificado, 
        defensa = defensaModificado, 
        especial = especialModificado, 
        velocidad = velocidadModificado
    WHERE numero_pokedex = numeroPokedex;
END $$

DELIMITER ;