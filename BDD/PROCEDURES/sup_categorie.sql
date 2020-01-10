-- Suppresion d'une categorie de la base de données

DELIMITER $$

CREATE PROCEDURE sup_categorie (printitule varchar(255) CHARSET utf8)
BEGIN
DELETE FROM Categorie WHERE Intitule = printitule;
END$$

DELIMITER ;
