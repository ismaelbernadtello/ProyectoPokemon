-- Añadir columna imagen a la tabla pokemon
ALTER TABLE pokemon ADD(imagen VARCHAR(100) DEFAULT 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png');


--Borrado y creacion de indices
ALTER TABLE pokemon DROP INDEX indiceNombrePokemon;
ALTER TABLE movimiento DROP INDEX indiceNombreMovimiento;
ALTER TABLE movimiento DROP INDEX indiceDescripcionMovimiento;

CREATE FULLTEXT INDEX indiceNombrePokemon ON pokemon(nombre); -- Para el filtrado por texto uso este indice con un MATCH AGAINST en la consulta
CREATE FULLTEXT INDEX indiceNombreMovimiento ON movimiento(nombre); -- Para el filtrado por texto uso este indice con un MATCH AGAINST en la consulta
CREATE FULLTEXT INDEX indiceDescripcionMovimiento ON movimiento(descripcion); -- Para el filtrado por texto uso este indice con un MATCH AGAINST en la consulta