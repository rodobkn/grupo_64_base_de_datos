CREATE OR REPLACE FUNCTION
insercion_radical (numero integer)
RETURNS void AS $$
DECLARE
temp varchar;
BEGIN
	FOR i IN 1..numero LOOP

		IF i>8 THEN
			temp := to_char(i,'99999999');
			insert into personas values (temp,temp,temp);

		END IF;

	END LOOP;
END
$$ language plpgsql
