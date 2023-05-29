DELIMITER $$
DROP FUNCTION IF EXISTS evoluciona_de$$
CREATE FUNCTION evoluciona_de(numeroPokedex INT)
RETURNS INT
READS SQL DATA
BEGIN
    DECLARE numeroPokedexPreevolucion INT;

    SELECT ed.pokemon_origen INTO numeroPokedexPreevolucion
    FROM pokemon as p 
    LEFT JOIN evoluciona_de as ed ON p.numero_pokedex = ed.pokemon_evolucionado
    WHERE p.numero_pokedex = numeroPokedex;

    RETURN numeroPokedexPreevolucion;
END $$
DELIMITER ;