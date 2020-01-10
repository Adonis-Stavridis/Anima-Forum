-- Modification de l'intitule d'une catégorie

DELIMITER $$

CREATE PROCEDURE mod_categorie (printitule varchar(255) CHARSET utf8, prnintitule varchar(255) CHARSET utf8)
BEGIN
UPDATE Categorie SET Intitule = prnintitule WHERE Intitule = printitule;
END$$

DELIMITER ;
