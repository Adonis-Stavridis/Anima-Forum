-- Modification du Pseudo d'un utilisateur

DELIMITER $$

CREATE PROCEDURE mod_pseudo (prid int, prpseudo varchar(32) CHARSET utf8)
BEGIN
UPDATE Utilisateur SET Pseudo = prpseudo WHERE ID = prid;
END$$

DELIMITER ;
