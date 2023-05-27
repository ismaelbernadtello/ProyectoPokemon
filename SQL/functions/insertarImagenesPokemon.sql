DELIMITER $$
DROP FUNCTION IF EXISTS insertarImagenPokemon$$
CREATE FUNCTION insertarImagenPokemon (idPokemon INT)
    RETURNS BOOLEAN
    NOT DETERMINISTIC
    READS SQL DATA
    BEGIN
        IF idPokemon BETWEEN 10 AND 99 THEN -- Esto es por el tema de las imágenes, ya que los números de la pokedex de los pokemons de 1 a 99 tienen un 0 delante y en la base no
            UPDATE pokemon as p SET imagen = CONCAT('https://assets.pokemon.com/assets/cms2/img/pokedex/full/0',idPokemon,'.png') WHERE p.numero_pokedex = idPokemon ;
        ELSE IF idPokemon < 10 THEN
            UPDATE pokemon as p SET imagen = CONCAT('https://assets.pokemon.com/assets/cms2/img/pokedex/full/00',idPokemon,'.png') WHERE p.numero_pokedex = idPokemon ;
        ELSE
            UPDATE pokemon as p SET imagen = CONCAT('https://assets.pokemon.com/assets/cms2/img/pokedex/full/',idPokemon,'.png') WHERE p.numero_pokedex = idPokemon ;
        END IF;
    END IF;
    RETURN TRUE;
    END $$
DELIMITER ;