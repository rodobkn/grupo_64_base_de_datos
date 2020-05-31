
CREATE or REPLACE Function Itinarios(C varchar, Artistas integer[])

RETURNS TABLE (id_viaje_1 int, id_ciudad_origen_1 int, id_ciudad_destino_1 int, horario_viaje_1 time, duracion_viaje_1 int, precio_viaje_1 int, id_viaje_2 int, id_ciudad_origen_2 int, id_ciudad_destino_2 int, horario_viaje_2 time, duracion_viaje_2 int, precio_viaje_2 int, id_viaje_3 int, id_ciudad_origen_3 int, id_ciudad_destino_3 int, horario_viaje_3 time, duracion_viaje_3 int, precio_viaje_3 int) AS
$$

BEGIN 

PERFORM * FROM dblink_connect('test5_connexion','dbname=grupo87e3 user=grupo87 password=sarahfelipe');

RETURN QUERY

SELECT * FROM dblink('test5_connexion', 'select did, cidorigen, ciddestino, horario, duracion, dprecio from destinos') AS t1(id_viaje_1 int, id_ciudad_origen_1 int, id_ciudad_destino_1 int, horario_1 time, duracion_1 int, precio_1 int),
 dblink('test5_connexion', 'select did, cidorigen, ciddestino, horario, duracion, dprecio from destinos') AS t2(id_viaje_2 int, id_ciudad_origen_2 int, id_ciudad_destino_2 int, horario_2 time, duracion_2 int, precio_2 int),
dblink('test5_connexion', 'select did, cidorigen, ciddestino, horario, duracion, dprecio from destinos') AS t3(id_viaje_3 int, id_ciudad_origen_3 int, id_ciudad_destino_3 int, horario_3 time, duracion_3 int, precio_3 int)


WHERE t1.id_ciudad_destino_1= t2.id_ciudad_origen_2
AND t2.id_ciudad_destino_2= t3.id_ciudad_origen_3

AND t1.id_ciudad_origen_1 = (SELECT id_ciudad FROM Ciudades WHERE ciudad = $1)

AND t1.id_ciudad_destino_1 IN (SELECT Lugares_Ciudades.id_ciudad FROM Artistas_Obras, Obras, Lugares_Obras, Lugares, Lugares_Ciudades
WHERE Artistas_Obras.id_artista = ANY($2)
AND Artistas_Obras.id_obra = Obras.id_obra
AND Obras.id_obra = Lugares_Obras.id_obra
AND Lugares_Obras.id_lugar = Lugares.id_lugar
AND Lugares.id_lugar = Lugares_Ciudades.id_lugar)

AND t2.id_ciudad_destino_2 IN (SELECT Lugares_Ciudades.id_ciudad FROM Artistas_Obras, Obras, Lugares_Obras, Lugares, Lugares_Ciudades
WHERE Artistas_Obras.id_artista = ANY($2)
AND Artistas_Obras.id_obra = Obras.id_obra
AND Obras.id_obra = Lugares_Obras.id_obra
AND Lugares_Obras.id_lugar = Lugares.id_lugar
AND Lugares.id_lugar = Lugares_Ciudades.id_lugar)

AND t3.id_ciudad_destino_3 IN (SELECT Lugares_Ciudades.id_ciudad FROM Artistas_Obras, Obras, Lugares_Obras, Lugares, Lugares_Ciudades
WHERE Artistas_Obras.id_artista = ANY($2)
AND Artistas_Obras.id_obra = Obras.id_obra
AND Obras.id_obra = Lugares_Obras.id_obra
AND Lugares_Obras.id_lugar = Lugares.id_lugar
AND Lugares.id_lugar = Lugares_Ciudades.id_lugar)

AND t1.horario_1 < t2.horario_2 - make_time(t1.duracion_1,0,0.00)

AND t2.horario_2 < t3.horario_3 - make_time(t2.duracion_2,0,0.00);

RETURN;

END 
$$ language plpgsql;



