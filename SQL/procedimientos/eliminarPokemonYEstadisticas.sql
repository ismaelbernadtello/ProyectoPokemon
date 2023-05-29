DELIMITER $$
DROP PROCEDURE IF EXISTS eliminarPokemonYEstadisticas$$
CREATE PROCEDURE eliminarPokemonYEstadisticas(IN numeroPokedex INT)
BEGIN
    DECLARE CONTINUE HANDLER FOR 23000 ROLLBACK;

    -- Solo elimino los pokemon que no son de la pokedex original y no dan problemas
    START TRANSACTION;
    -- Elimino los datos de la tabla estadisticas_base
    DELETE FROM estadisticas_base WHERE numero_pokedex = numeroPokedex;

    -- Elimino los datos de la tabla pokemon
    DELETE FROM pokemon WHERE numero_pokedex = numeroPokedex;
    COMMIT;

END $$
DELIMITER ;