
CREATE or REPLACE Function Itinarios(C varchar, Artistas integer[])

RETURNS TABLE (id_viaje int, id_ciudad_origen int, id_ciudad_destino int) AS
$$

BEGIN 

RETURN QUERY 

SELECT * FROM dblink_connect('test_connexion','dbname=grupo87e3 user=grupo87 password=sarahfelipe');

RETURN QUERY EXECUTE

SELECT * FROM dblink('test_connexion', 'select did, cidorigen, ciddestino from destinos') AS t1(id_viaje int, id_ciudad_origen int, id_ciudad_destino int) 
WHERE id_ciudad_origen = (SELECT id_ciudad FROM Ciudades WHERE ciudad =$1)

AND id_ciudad_destino IN (SELECT Lugares_Ciudades.id_ciudad AS Ciudades_destino_target FROM Artistas_Obras, Obras, Lugares_Obras, Lugares, Lugares_Ciudades
WHERE id_artista in $2
AND Artistas.id_artista = Artistas_Obras.id_artista
AND Artistas_Obras.id_obra = Obras.id_obra
AND Obras.id_obra = Lugares_Obras.id_obra
AND Lugares_Obras.id_lugar = Lugares.id_lugar
AND Lugares.id_lugar = Lugares_Ciudades.id_lugar)
USING C, Artistas ;

RETURN;

END 
$$ language plpgsql;



