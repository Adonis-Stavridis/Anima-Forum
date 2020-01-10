-- Suppresion d'un commentaire de la base de données

DELIMITER $$

CREATE PROCEDURE sup_commentaire (prid int)
BEGIN
DELETE FROM Commentaire_note WHERE Commentaire = prid;
DELETE FROM Commentaire WHERE ID = prid;
END$$

DELIMITER ;
