-- Modification des droits d'un utilisateur

DELIMITER $$

CREATE PROCEDURE mod_droits (prlogin varchar(32) CHARSET utf8, prdroit int)
BEGIN
UPDATE Utilisateur SET Droit = prdroit WHERE Login = prlogin;
END$$

DELIMITER ;
