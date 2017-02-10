SELECT titre, resum
FROM film
WHERE (SELECT titre REGEXP '42') OR (SELECT resum REGEXP '42')
ORDER BY duree_min;
