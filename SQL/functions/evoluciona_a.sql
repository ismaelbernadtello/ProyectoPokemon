DELIMITER $$
DROP FUNCTION IF EXISTS evoluciona_a$$
CREATE FUNCTION evoluciona_a(numeroPokedex INT)
RETURNS INT
READS SQL DATA
BEGIN
    DECLARE numeroPokedexEvolucionA INT;

    SELECT ed.pokemon_evolucionado INTO numeroPokedexEvolucionA
    FROM pokemon as p 
    LEFT JOIN evoluciona_de as ed ON p.numero_pokedex = ed.pokemon_origen
    WHERE p.numero_pokedex = numeroPokedex;

    RETURN numeroPokedexEvolucionA;
END $$
DELIMITER ;
