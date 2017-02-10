SELECT titre, resum
FROM film
WHERE (SELECT resum REGEXP 'vincent'i)
ORDER BY id_film;
