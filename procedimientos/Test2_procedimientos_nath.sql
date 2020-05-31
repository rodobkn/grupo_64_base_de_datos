
CREATE or REPLACE Function Itinarios(C varchar)

RETURNS TABLE (id_viaje int, id_ciudad_origen int, id_ciudad_destino int) AS
$$

BEGIN 

PERFORM * FROM dblink_connect('test2_connexion','dbname=grupo87e3 user=grupo87 password=sarahfelipe');

RETURN QUERY

SELECT * FROM dblink('test2_connexion', 'select did, cidorigen, ciddestino from destinos') AS t1(id_viaje int, id_ciudad_origen int, id_ciudad_destino int) 
WHERE t1.id_ciudad_origen = (SELECT id_ciudad FROM Ciudades WHERE ciudad = C);

RETURN;

END 
$$ language plpgsql;



