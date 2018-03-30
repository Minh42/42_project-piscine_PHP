SELECT nom, prenom 
FROM fiche_personne
WHERE nom LIKE '%-%'
ORDER BY nom, prenom ASC;
