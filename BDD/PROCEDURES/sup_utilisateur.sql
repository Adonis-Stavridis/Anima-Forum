-- Suppresion d'un utilisateur de la base de données

DELIMITER $$

CREATE PROCEDURE sup_utilisateur (prid int)
BEGIN
DELETE FROM Utilisateur WHERE ID = prid;
END$$

DELIMITER ;
