SELECT REVERSE(RIGHT(telephone, LENGTH(telephone) - 1)) AS 'enohpelet'
FROM distrib
WHERE (SELECT telephone REGEXP '^05');
