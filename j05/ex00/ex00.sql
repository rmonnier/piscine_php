CREATE DATABASE db_rmonnier;

CREATE TABLE ft_table
	(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	login VARCHAR(8) NOT NULL DEFAULT "toto",
	groupe ENUM("staff", "student", "other") NOT NULL,
	date_de_creation DATE NOT NULL);

INSERT INTO ft_table (login, groupe, date_de_creation)
VALUES ('loki', 'staff', '2013-05-01');

INSERT INTO ft_table (login, date_de_creation, groupe)
SELECT nom, date_naissance, 'other'
FROM fiche_personne
WHERE (SELECT nom REGEXP 'a') AND (LENGTH(nom) < 9)
ORDER BY nom LIMIT 10;

UPDATE ft_table
SET date_de_creation = DATE_ADD(date_de_creation, INTERVAL 20 YEAR)
WHERE id > 5;

DELETE FROM ft_table
LIMIT 5;

SELECT titre, resum
FROM film
WHERE (SELECT resum REGEXP 'vincent'i)
ORDER BY id_film;
