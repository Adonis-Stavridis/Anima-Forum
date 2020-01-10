-- Selection des commentaires

DELIMITER $$

CREATE PROCEDURE get_commentaires (prtopic int)
BEGIN
SELECT Commentaire.ID as ID, Intitule, Note, DATE_FORMAT(Ecriture, "%d %M %Y") as Ecriture, Pseudo FROM Commentaire, Utilisateur WHERE Topic = prtopic AND Utilisateur = Utilisateur.ID ORDER BY Commentaire.ID ASC;
END$$

DELIMITER ;
