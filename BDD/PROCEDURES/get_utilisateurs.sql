-- Selection des Utilisateurs

DELIMITER $$

CREATE PROCEDURE get_utilisateurs ()
BEGIN
SELECT Utilisateur.ID as ID, Login, Pseudo, Signification FROM Utilisateur, Droit WHERE Utilisateur.Droit = Droit.ID ORDER BY Utilisateur.ID DESC;
END$$

DELIMITER ;
