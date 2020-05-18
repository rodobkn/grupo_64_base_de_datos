--
-- PostgreSQL database dump
--

-- Dumped from database version 10.12 (Ubuntu 10.12-0ubuntu0.18.04.1)
-- Dumped by pg_dump version 10.12 (Ubuntu 10.12-0ubuntu0.18.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: artistas; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.artistas (
    id_artista integer NOT NULL,
    nombre_artista character varying(255),
    descripcion text,
    fecha_nacimiento date,
    fecha_fallecimiento date
);


ALTER TABLE public.artistas OWNER TO grupo64;

--
-- Name: artistas_obras; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.artistas_obras (
    id_artista integer NOT NULL,
    id_obra integer NOT NULL
);


ALTER TABLE public.artistas_obras OWNER TO grupo64;

--
-- Name: ciudades; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.ciudades (
    id_ciudad integer NOT NULL,
    ciudad character varying(30)
);


ALTER TABLE public.ciudades OWNER TO grupo64;

--
-- Name: ciudades_contacto_paises; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.ciudades_contacto_paises (
    id_ciudad integer NOT NULL,
    pais character varying(30)
);


ALTER TABLE public.ciudades_contacto_paises OWNER TO grupo64;

--
-- Name: contacto_paises; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.contacto_paises (
    pais character varying(30) NOT NULL,
    contacto character varying(15)
);


ALTER TABLE public.contacto_paises OWNER TO grupo64;

--
-- Name: esculturas; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.esculturas (
    id_obra integer NOT NULL,
    material character varying(255)
);


ALTER TABLE public.esculturas OWNER TO grupo64;

--
-- Name: frescos; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.frescos (
    id_obra integer NOT NULL
);


ALTER TABLE public.frescos OWNER TO grupo64;

--
-- Name: iglesias; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.iglesias (
    id_lugar integer NOT NULL,
    hora_apertura time without time zone,
    hora_cierre time without time zone
);


ALTER TABLE public.iglesias OWNER TO grupo64;

--
-- Name: lugares; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.lugares (
    id_lugar integer NOT NULL,
    nombre_lugar character varying(60)
);


ALTER TABLE public.lugares OWNER TO grupo64;

--
-- Name: lugares_ciudades; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.lugares_ciudades (
    id_lugar integer NOT NULL,
    id_ciudad integer
);


ALTER TABLE public.lugares_ciudades OWNER TO grupo64;

--
-- Name: lugares_obras; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.lugares_obras (
    id_obra integer NOT NULL,
    id_lugar integer
);


ALTER TABLE public.lugares_obras OWNER TO grupo64;

--
-- Name: museos; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.museos (
    id_lugar integer NOT NULL,
    precio integer,
    hora_apertura time without time zone,
    hora_cierre time without time zone
);


ALTER TABLE public.museos OWNER TO grupo64;

--
-- Name: obras; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.obras (
    id_obra integer NOT NULL,
    nombre_obra character varying(255),
    fecha_1 integer,
    fecha_2 integer,
    periodo character varying(255)
);


ALTER TABLE public.obras OWNER TO grupo64;

--
-- Name: pinturas; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.pinturas (
    id_obra integer NOT NULL,
    tecnica character varying(255)
);


ALTER TABLE public.pinturas OWNER TO grupo64;

--
-- Name: plazas; Type: TABLE; Schema: public; Owner: grupo64
--

CREATE TABLE public.plazas (
    id_lugar integer NOT NULL
);


ALTER TABLE public.plazas OWNER TO grupo64;

--
-- Data for Name: artistas; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.artistas (id_artista, nombre_artista, descripcion, fecha_nacimiento, fecha_fallecimiento) FROM stdin;
1	Andrea Mantegna	Fue un pintor del Quattrocento italiano. Andrea construyó y pintó para su uso personal una hermosa casa en Mantua, en la cual residió toda su vida. Los últimos años de Andrea Mantegna en la Corte de Mantua los pasó bajo la protección de Isabel de Este, unánimemente reconocida como una de las damas humanistas más ilustradas del Renacimiento Italiano que se rodeó en su pequeño estudio del Castillo de San Jorge de una importante corte de artistas y pintores del momento.	1431-09-13	1506-09-13
2	Andrea del Verrocchio	Fue un pintor, escultor y orfebre cuatrocentista italiano. Trabajó en la corte de Lorenzo de Medici en Florencia. Entre sus alumnos estuvieron Leonardo da Vinci, Perugino, Ghirlandaio y Sandro Botticelli, pero también influyó en Miguel Ángel. Trabajó en el estilo serenamente clásico del primer renacimiento florentino.	1435-04-15	1488-05-02
3	Arnolfo di Cambio	Fue un arquitecto y escultor florentino. Su obra arquitectónica incluye el proyecto de la catedral de Santa María del Fiore, en Florencia (1294), la Basílica de Santa Cruz, en la misma ciudad y la catedral de Orvieto en Italia.	1748-08-30	1825-12-29
4	Caravaggio	Fue un pintor italiano, activo en Roma, Nápoles, Malta y Sicilia. Su pintura combina una observación realista de la figura humana, tanto en lo físico como en lo emocional, con un uso dramático de la luz, lo cual ejerció una influencia decisiva en la formación de la pintura del Barroco.	1571-09-29	1610-07-18
5	Donatello	Fue un artista y escultor italiano de principios del Renacimiento, uno de los padres del periodo junto con Leon Battista Alberti, Brunelleschi y Masaccio. Donatello se convirtió en una fuerza innovadora en el campo de la escultura monumental y en el tratamiento de los relieves, donde logró representar una gran profundidad dentro de un mínimo plano, denominándose con el nombre de stiacciato, es decir relieve aplanado o aplastado.	1386-12-13	1466-12-13
6	Eugene Delacroix	Fue un pintor y litógrafo francés. A sus 30 años logra provocar controversia en el público con el cuadro La muerte de Sardanápalo pintado en 1827 y expuesto en el Salón de París. Es un cuadro en el que hace gala de una de sus más espléndidas combinaciones del color.	1798-04-26	1863-08-13
7	Federico Zuccaro	Fue un pintor, arquitecto y escritor italiano, que trabajó en España. Fue alumno de su hermano Taddeo Zuccaro, a quien ayudó en sus trabajos en el Vaticano y el Palazzo Caprarola. El duque de Toscana Cosimo I le llamó luego a su corte en Florencia para que terminase allí la decoración de la cúpula de Santa María del Fiore, iniciada por Giorgio Vasari.	1542-06-27	1609-06-27
8	Floris Geerts	Es un profesor investigador en la Universidad de Amberes, Bélgica. Antes de eso, ocupó un puesto de investigador senior en el grupo de base de datos en la Universidad de Edimburgo y un puesto postdoctoral en el grupo de minería de datos en la Universidad de Helsinki. Recibió su doctorado en 2001 en la Universidad de Hasselt, Bélgica. Construyó junto a su esposa una inteligencia artificial que hace pitufiesculturas.	1975-05-17	2100-08-20
9	Giacomo della Porta	Fue un escultor y arquitecto italiano que trabajó en muchos edificios importantes en Roma, incluyendo la Basílica de San Pedro de la Ciudad del Vaticano.	1540-12-07	1602-12-07
10	Gian Lorenzo Bernini	Fue un escultor, arquitecto y pintor italiano. Trabajó principalmente en Roma y es considerado el más destacado escultor de su generación, creador del estilo escultórico barroco.	1598-12-07	1680-11-28
11	Giorgio Vasari	Fue un arquitecto, pintor y escritor italiano. Considerado uno de los primeros historiadores del arte, es célebre por sus biografías de artistas italianos, colección de datos, anécdotas, leyendas y curiosidades recogidas en su libro Las vidas de los más excelentes pintores, escultores y arquitectos.	1511-07-30	1574-06-27
12	Giotto	Fue un pintor, muralista, escultor y arquitecto florentino de la Baja Edad Media, un autor del Trecento considerado uno de los iniciadores del movimiento renacentista en Italia. Su obra tuvo una influencia determinante en los movimientos pictóricos posteriores. Un contemporáneo de Giotto, el banquero y cronista Giovanni Villani, lo describió como el maestro de pintura más soberano de su tiempo, quien dibujó todas sus figuras y sus posturas de acuerdo con la naturaleza, y reconoció públicamente su talento y excelencia.	1267-01-08	1337-01-08
13	Jacques-Louis David	Fue un pintor francés de gran influencia en el estilo neoclásico. Buscó la inspiración en los modelos escultóricos y mitológicos griegos, basándose en su austeridad y severidad, algo que cuadraba con el clima moral de los últimos años del antiguo régimen.	1748-08-30	1825-12-29
14	Jerome Duquesnoy	Fue un escultor flamenco que jugó un papel importante en el renacimiento artístico en el sur de los Países Bajos tras los disturbios religiosos e iconoclastas del siglo XVI. Fuentes documentales muestran que estaba ocupado y encargado de encargos escultóricos para todas las iglesias principales, así como para los edificios del gobierno. Nada de esto ha sobrevivido.	1570-04-28	1641-04-26
15	Kristin Geerts	Es una doctora en bioquímica de la Universidad de Leuven, Bélgica. Es una experta cocinera, que hace el mejor Humus en toda Europa. Justo a su esposo Floris, construyó una inteligencia artificial que hace pitufiesculturas.	1976-08-21	2100-08-07
16	Leonardo da Vinci	Fue un polímata florentino del Renacimiento italiano. Fue a la vez pintor, anatomista, arquitecto, paleontólogo, artista, botánico, científico, escritor, escultor, filósofo, ingeniero, inventor, músico, poeta y urbanista. Sus primeros trabajos de importancia fueron creados en Milán al servicio del duque Ludovico Sforza. Trabajó a continuación en Roma, Bolonia y Venecia, y pasó sus últimos años en Francia, por invitación del rey Francisco I.	1452-04-15	1519-05-02
17	Michelangelo Buonarroti	Fue un arquitecto, escultor y pintor italiano renacentista, considerado uno de los más grandes artistas de la historia tanto por sus esculturas como por sus pinturas y obra arquitectónica. Desarrolló su labor artística a lo largo de más de setenta años entre Florencia y Roma, que era donde vivían sus grandes mecenas, la familia Médici de Florencia y los diferentes papas romanos.	1475-03-06	1564-02-18
18	Raffaello Sanzio	Fue un pintor y arquitecto italiano del Renacimiento. Además de su labor pictórica, que sería admirada e imitada durante siglos, realizó importantes aportes en la arquitectura y, como inspector de antigüedades, se interesó en el estudio y conservación de los vestigios grecorromanos.	1483-04-06	1520-04-06
19	Sandro Botticelli	Fue un pintor del Quattrocento italiano. Pertenece, a su vez, a la tercera generación cuatrocentista, encabezada por Lorenzo de Médici el Magnífico y Angelo Poliziano	1451-03-01	1510-05-07
\.


--
-- Data for Name: artistas_obras; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.artistas_obras (id_artista, id_obra) FROM stdin;
1	1
2	2
2	3
3	4
4	5
4	6
4	7
4	8
4	9
5	10
6	11
7	12
8	13
8	14
9	15
10	16
10	17
10	18
10	19
10	20
10	21
12	22
12	23
12	24
13	25
14	26
16	27
16	28
17	29
17	30
17	31
17	32
17	33
18	34
18	35
18	36
18	37
19	38
19	39
16	3
11	12
15	13
16	2
\.


--
-- Data for Name: ciudades; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.ciudades (id_ciudad, ciudad) FROM stdin;
1	Roma
2	Florencia
3	París
4	Chantilly
5	Nancy
6	Bruselas
7	Antwerp
8	Dresde
9	Westminster
10	Milán
\.


--
-- Data for Name: ciudades_contacto_paises; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.ciudades_contacto_paises (id_ciudad, pais) FROM stdin;
1	Italia
2	Italia
3	Francia
4	Francia
5	Francia
6	Bélgica
7	Bélgica
8	Alemania
9	Inglaterra
10	Italia
\.


--
-- Data for Name: contacto_paises; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.contacto_paises (pais, contacto) FROM stdin;
Italia	433-666-975
Francia	133-154-268
Bélgica	758-382-381
Alemania	199-786-913
Inglaterra	129-666-539
\.


--
-- Data for Name: esculturas; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.esculturas (id_obra, material) FROM stdin;
4	Bronce
6	Mármol
10	Madera
13	Flores [] (arreglos florales)
15	Mármol
16	Mármol blanco
18	Mármol
19	Mármol
20	Mármol
21	Mármol
26	Bronce
29	Mármol
30	Mármol blanco
31	Mármol
\.


--
-- Data for Name: frescos; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.frescos (id_obra) FROM stdin;
12
14
17
23
27
32
33
34
\.


--
-- Data for Name: iglesias; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.iglesias (id_lugar, hora_apertura, hora_cierre) FROM stdin;
3	07:00:00	19:00:00
6	09:00:00	18:30:00
9	08:00:00	19:00:00
12	07:00:00	19:30:00
17	07:00:00	19:30:00
19	07:00:00	12:00:00
20	09:00:00	16:00:00
\.


--
-- Data for Name: lugares; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.lugares (id_lugar, nombre_lugar) FROM stdin;
1	Museo del Louvre
2	Galería Uffizi
3	La basílica de San Pedro
4	Museos Vaticanos
5	Royal Academy of Arts
6	Basílica de Santa María del Popolo
7	El Museo de Bellas Artes de Nancy
8	Museo de la Ópera del duomo
9	Santa María del Fiore
10	Piazza di Floros
11	Piazza Navona
12	Iglesia de Santa María de la Victoria
13	Piazza della Minerva
14	Piazza San Pietro
15	Galería Borghese
16	Museo de la ciudad de Bruselas
17	Santa Maria delle Grazie
18	Galería de la Academia
19	San Pietro in Vincoli
20	Capilla Sixtina
21	Galería de Pinturas de los Maestros Antiguos
22	Museo Condé
\.


--
-- Data for Name: lugares_ciudades; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.lugares_ciudades (id_lugar, id_ciudad) FROM stdin;
1	3
2	2
3	1
4	1
5	9
6	1
7	5
8	2
9	2
10	7
11	1
12	1
13	1
14	1
15	1
16	6
17	10
18	2
19	1
20	1
21	8
22	4
\.


--
-- Data for Name: lugares_obras; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.lugares_obras (id_obra, id_lugar) FROM stdin;
1	1
2	2
3	2
4	3
5	4
6	5
7	6
8	7
9	2
10	8
11	1
12	9
13	10
14	1
15	11
16	11
17	1
18	12
19	13
20	14
21	15
22	2
23	1
24	2
25	1
26	16
27	17
28	1
29	3
30	18
31	19
32	20
33	20
34	4
35	4
36	21
37	22
38	2
39	2
\.


--
-- Data for Name: museos; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.museos (id_lugar, precio, hora_apertura, hora_cierre) FROM stdin;
1	20	09:00:00	18:00:00
2	12	10:00:00	18:00:00
4	17	09:00:00	16:00:00
5	30	10:00:00	18:00:00
7	30	10:00:00	18:00:00
8	15	10:00:00	18:00:00
15	15	09:00:00	16:00:00
16	10	10:00:00	17:00:00
18	6	09:00:00	16:00:00
21	20	10:00:00	18:00:00
22	40	10:00:00	18:00:00
\.


--
-- Data for Name: obras; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.obras (id_obra, nombre_obra, fecha_1, fecha_2, periodo) FROM stdin;
1	San Sebastián	1479	1480	Renacimiento
2	La Anunciación	1472	1475	Renacimiento
3	Bautismo de Cristo	1472	1475	Renacimiento
4	La Estatua de San Pedro	1300	1305	Gótico
5	El Santo Entierro	1602	1604	Barroco
6	Tondo Taddei	1504	1506	Renacimiento
7	Crucifixión de San Pedro	1600	1601	Barroco
8	La Anunciación	1607	1608	Barroco
9	La cabeza de Medusa	1596	1597	Barroco
10	María Magdalena Penitente	1453	1455	Renacimiento
11	La Libertad guiando al pueblo	1829	1830	Romanticismo
12	El juicio Final	1541	1563	Renacimiento
13	Pitufiescultura	2018	2019	Neoclasicismo Romano de mediados del siglo XVII 1/2
14	PitufiFresco	2019	2020	Neoclasicismo Romano de mediados del siglo XVII 1/2
15	La Fuente de Neptuno	1573	1574	Renacimiento
16	La Fuente de los Cuatro Ríos	1648	1651	Barroco
17	La anunciación	1618	1619	Barroco
18	Éxtasis de Santa Teresa	1645	1652	Barroco
19	Pulcin della Minerva	1666	1667	Barroco
20	Santos Piazza San Pietro	1656	1667	Barroco
21	Apolo y Dafne	1622	1625	Barroco
22	Maesta di Ognissanti	1309	1310	Gótico
23	La anunciación	1300	1304	Gótico
24	Polittico di Badia	1299	1300	Gótico
25	La consagración de Napoleón	1805	1807	Neoclasicismo
26	Manneken Pis	1618	1619	Barroco
27	La última cena	1495	1498	Renacimiento
28	La Mona Lisa	1503	1519	Renacimiento
29	La Piedad	1498	1499	Renacimiento
30	El David	1501	1504	Renacimiento
31	El Moisés	1513	1515	Renacimiento
32	La creación de Adán	1500	1511	Renacimiento
33	El Juicio Final	1537	1541	Renacimiento
34	Estancias de Rafael	1508	1524	Renacimiento
35	La transfiguración	1517	1520	Renacimiento
36	Madonna Sixtina	1513	1514	Renacimiento
37	Las Gracias	1504	1505	Renacimiento
38	La primavera	1477	1478	Renacimiento
39	El nacimiento de Venus	1482	1485	Renacimiento
\.


--
-- Data for Name: pinturas; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.pinturas (id_obra, tecnica) FROM stdin;
1	Óleo sobre lienzo
2	Óleo y temple sobre tabla
3	Óleo sobre tabla
5	Óleo sobre lienzo
7	Óleo sobre lienzo
8	Pintura al Óleo
9	Óleo sobre lienzo
11	Óleo sobre lienzo
22	Panel
24	Tempera sobre panel
25	Óleo sobre lienzo
28	Pintura al óleo sobre tabla de álamo
35	Temple y óleo sobre madera
36	Óleo sobre lienzo
37	Óleo sobre tabla
38	Temple sobre tabla
39	Temple sobre lienzo
\.


--
-- Data for Name: plazas; Type: TABLE DATA; Schema: public; Owner: grupo64
--

COPY public.plazas (id_lugar) FROM stdin;
10
11
13
14
\.


--
-- Name: artistas_obras artistas_obras_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.artistas_obras
    ADD CONSTRAINT artistas_obras_pkey PRIMARY KEY (id_artista, id_obra);


--
-- Name: artistas artistas_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.artistas
    ADD CONSTRAINT artistas_pkey PRIMARY KEY (id_artista);


--
-- Name: ciudades_contacto_paises ciudades_contacto_paises_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.ciudades_contacto_paises
    ADD CONSTRAINT ciudades_contacto_paises_pkey PRIMARY KEY (id_ciudad);


--
-- Name: ciudades ciudades_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.ciudades
    ADD CONSTRAINT ciudades_pkey PRIMARY KEY (id_ciudad);


--
-- Name: contacto_paises contacto_paises_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.contacto_paises
    ADD CONSTRAINT contacto_paises_pkey PRIMARY KEY (pais);


--
-- Name: esculturas esculturas_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.esculturas
    ADD CONSTRAINT esculturas_pkey PRIMARY KEY (id_obra);


--
-- Name: frescos frescos_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.frescos
    ADD CONSTRAINT frescos_pkey PRIMARY KEY (id_obra);


--
-- Name: iglesias iglesias_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.iglesias
    ADD CONSTRAINT iglesias_pkey PRIMARY KEY (id_lugar);


--
-- Name: lugares_ciudades lugares_ciudades_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.lugares_ciudades
    ADD CONSTRAINT lugares_ciudades_pkey PRIMARY KEY (id_lugar);


--
-- Name: lugares_obras lugares_obras_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.lugares_obras
    ADD CONSTRAINT lugares_obras_pkey PRIMARY KEY (id_obra);


--
-- Name: lugares lugares_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.lugares
    ADD CONSTRAINT lugares_pkey PRIMARY KEY (id_lugar);


--
-- Name: museos museos_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.museos
    ADD CONSTRAINT museos_pkey PRIMARY KEY (id_lugar);


--
-- Name: obras obras_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.obras
    ADD CONSTRAINT obras_pkey PRIMARY KEY (id_obra);


--
-- Name: pinturas pinturas_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.pinturas
    ADD CONSTRAINT pinturas_pkey PRIMARY KEY (id_obra);


--
-- Name: plazas plazas_pkey; Type: CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.plazas
    ADD CONSTRAINT plazas_pkey PRIMARY KEY (id_lugar);


--
-- Name: artistas_obras artistas_obras_id_artista_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.artistas_obras
    ADD CONSTRAINT artistas_obras_id_artista_fkey FOREIGN KEY (id_artista) REFERENCES public.artistas(id_artista);


--
-- Name: artistas_obras artistas_obras_id_obra_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.artistas_obras
    ADD CONSTRAINT artistas_obras_id_obra_fkey FOREIGN KEY (id_obra) REFERENCES public.obras(id_obra);


--
-- Name: ciudades_contacto_paises ciudades_contacto_paises_id_ciudad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.ciudades_contacto_paises
    ADD CONSTRAINT ciudades_contacto_paises_id_ciudad_fkey FOREIGN KEY (id_ciudad) REFERENCES public.ciudades(id_ciudad);


--
-- Name: ciudades_contacto_paises ciudades_contacto_paises_pais_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.ciudades_contacto_paises
    ADD CONSTRAINT ciudades_contacto_paises_pais_fkey FOREIGN KEY (pais) REFERENCES public.contacto_paises(pais);


--
-- Name: esculturas esculturas_id_obra_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.esculturas
    ADD CONSTRAINT esculturas_id_obra_fkey FOREIGN KEY (id_obra) REFERENCES public.obras(id_obra);


--
-- Name: frescos frescos_id_obra_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.frescos
    ADD CONSTRAINT frescos_id_obra_fkey FOREIGN KEY (id_obra) REFERENCES public.obras(id_obra);


--
-- Name: iglesias iglesias_id_lugar_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.iglesias
    ADD CONSTRAINT iglesias_id_lugar_fkey FOREIGN KEY (id_lugar) REFERENCES public.lugares(id_lugar);


--
-- Name: lugares_ciudades lugares_ciudades_id_ciudad_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.lugares_ciudades
    ADD CONSTRAINT lugares_ciudades_id_ciudad_fkey FOREIGN KEY (id_ciudad) REFERENCES public.ciudades(id_ciudad);


--
-- Name: lugares_ciudades lugares_ciudades_id_lugar_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.lugares_ciudades
    ADD CONSTRAINT lugares_ciudades_id_lugar_fkey FOREIGN KEY (id_lugar) REFERENCES public.lugares(id_lugar);


--
-- Name: lugares_obras lugares_obras_id_lugar_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.lugares_obras
    ADD CONSTRAINT lugares_obras_id_lugar_fkey FOREIGN KEY (id_lugar) REFERENCES public.lugares(id_lugar);


--
-- Name: lugares_obras lugares_obras_id_obra_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.lugares_obras
    ADD CONSTRAINT lugares_obras_id_obra_fkey FOREIGN KEY (id_obra) REFERENCES public.obras(id_obra);


--
-- Name: museos museos_id_lugar_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.museos
    ADD CONSTRAINT museos_id_lugar_fkey FOREIGN KEY (id_lugar) REFERENCES public.lugares(id_lugar);


--
-- Name: pinturas pinturas_id_obra_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.pinturas
    ADD CONSTRAINT pinturas_id_obra_fkey FOREIGN KEY (id_obra) REFERENCES public.obras(id_obra);


--
-- Name: plazas plazas_id_lugar_fkey; Type: FK CONSTRAINT; Schema: public; Owner: grupo64
--

ALTER TABLE ONLY public.plazas
    ADD CONSTRAINT plazas_id_lugar_fkey FOREIGN KEY (id_lugar) REFERENCES public.lugares(id_lugar);


--
-- PostgreSQL database dump complete
--

