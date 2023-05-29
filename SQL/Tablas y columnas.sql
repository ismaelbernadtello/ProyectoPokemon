-- Elimino un registro de charmander que estaba mal en la base original y me causa problemas
DELETE FROM evoluciona_de WHERE pokemon_evolucionado = 5 AND pokemon_origen = 6;

-- Añadir columna imagen a la tabla pokemon
ALTER TABLE pokemon ADD(imagen VARCHAR(100) DEFAULT 'https://assets.pokemon.com/assets/cms2/img/pokedex/full/001.png');
CALL insertarImagenesPokemon(); -- Dentro del procedimiento hay un cursor con el que se llama a la función que añade la imagen para cada pokemon

-- Borrado Indices Pokemon
ALTER TABLE pokemon DROP INDEX indiceNombrePokemon;

-- Indices para el filtrado de Pokemon
CREATE FULLTEXT INDEX indiceNombrePokemon ON pokemon(nombre); -- Para el filtrado por texto uso este indice con un MATCH AGAINST en la consulta

-- Borrado Indices Movimiento
ALTER TABLE movimiento DROP INDEX indiceNombreMovimiento;
ALTER TABLE movimiento DROP INDEX indiceDescripcionMovimiento;
ALTER TABLE tipo DROP INDEX indiceNombreTipo;
ALTER TABLE tipo_ataque DROP INDEX indiceTipoAtaque;
ALTER TABLE efecto_secundario DROP INDEX indiceEfectoSecundario;
ALTER TABLE tipo_forma_aprendizaje DROP INDEX indiceTipoAprendizaje;

-- Indices para el filtrado de Movimiento
CREATE FULLTEXT INDEX indiceNombreMovimiento ON movimiento(nombre); -- Para el filtrado por texto uso este indice con un MATCH AGAINST en la consulta
CREATE FULLTEXT INDEX indiceDescripcionMovimiento ON movimiento(descripcion); -- Para el filtrado por texto uso este indice con un MATCH AGAINST en la consulta
CREATE FULLTEXT INDEX indiceNombreTipo ON tipo(nombre); -- Para el filtrado por texto uso este indice con un MATCH AGAINST en la consulta
CREATE FULLTEXT INDEX indiceTipoAtaque ON tipo_ataque(tipo); -- Para el filtrado por texto uso este indice con un MATCH AGAINST en la consulta
CREATE FULLTEXT INDEX indiceEfectoSecundario ON efecto_secundario(efecto_secundario); -- Para el filtrado por texto uso este indice con un MATCH AGAINST en la consulta
CREATE FULLTEXT INDEX indiceTipoAprendizaje ON tipo_forma_aprendizaje(tipo_aprendizaje); -- Para el filtrado por texto uso este indice con un MATCH AGAINST en la consulta