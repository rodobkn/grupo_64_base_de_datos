
CREATE or REPLACE Function Itinarios(C varchar, Artistas integer[])

RETURNS TABLE (id_viaje int, id_ciudad_origen int, id_ciudad_destino int) AS
$$

BEGIN 

PERFORM * FROM dblink_connect('test2_connexion','dbname=grupo87e3 user=grupo87 password=sarahfelipe');

RETURN QUERY

SELECT * FROM dblink('test2_connexion', 'select did, cidorigen, ciddestino from destinos') AS t1(id_viaje int, id_ciudad_origen int, id_ciudad_destino int) 
WHERE t1.id_ciudad_origen = (SELECT id_ciudad FROM Ciudades WHERE ciudad = C)

AND t1.id_ciudad_destino IN (SELECT Lugares_Ciudades.id_ciudad FROM Artistas_Obras, Obras, Lugares_Obras, Lugares, Lugares_Ciudades
WHERE id_artista in Artistas
AND Artistas.id_artista = Artistas_Obras.id_artista
AND Artistas_Obras.id_obra = Obras.id_obra
AND Obras.id_obra = Lugares_Obras.id_obra
AND Lugares_Obras.id_lugar = Lugares.id_lugar
AND Lugares.id_lugar = Lugares_Ciudades.id_lugar);

RETURN;

END 
$$ language plpgsql;



