
CREATE or REPLACE Function Itinarios(C varchar, Artistas integer[])

RETURNS TABLE (id_viaje int, id_ciudad_origen int, id_ciudad_destino int, horario time, duracion real, precio real) AS
$$

BEGIN 

PERFORM * FROM dblink_connect('test3_connexion','dbname=grupo87e3 user=grupo87 password=sarahfelipe');

RETURN QUERY

SELECT * FROM dblink('test3_connexion', 'select did, cidorigen, ciddestino, horario, duracion, dprecio from destinos') AS t1(id_viaje int, id_ciudad_origen int, id_ciudad_destino int, horario time, duracion real, precio real) 
WHERE t1.id_ciudad_origen = (SELECT id_ciudad FROM Ciudades WHERE ciudad = $1)

AND t1.id_ciudad_destino IN (SELECT Lugares_Ciudades.id_ciudad FROM Artistas_Obras, Obras, Lugares_Obras, Lugares, Lugares_Ciudades
WHERE Artistas_Obras.id_artista = ANY($2)
AND Artistas_Obras.id_obra = Obras.id_obra
AND Obras.id_obra = Lugares_Obras.id_obra
AND Lugares_Obras.id_lugar = Lugares.id_lugar
AND Lugares.id_lugar = Lugares_Ciudades.id_lugar);

RETURN;

END 
$$ language plpgsql;



