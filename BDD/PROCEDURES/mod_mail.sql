-- Modification du mail d'un utilisateur

DELIMITER $$

CREATE PROCEDURE mod_mail (prid int, prmail varchar(255) CHARSET utf8)
BEGIN
UPDATE Utilisateur SET Mail = prmail WHERE ID = prid;
END$$

DELIMITER ;
