-- Selection des Topics

DELIMITER $$

CREATE PROCEDURE get_topics (prcategorie int)
BEGIN
SELECT Topic.ID as ID, Intitule, Note, Pseudo, DATE_FORMAT(Modif, "%d %M %Y") as Modif FROM Topic, Utilisateur WHERE Categorie = prcategorie AND Utilisateur = Utilisateur.ID ORDER BY Modif DESC;
END$$

DELIMITER ;
