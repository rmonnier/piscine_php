SELECT nom, prenom
FROM fiche_personne
WHERE (SELECT nom REGEXP '-') OR (SELECT prenom REGEXP '-')
ORDER BY nom, prenom;
