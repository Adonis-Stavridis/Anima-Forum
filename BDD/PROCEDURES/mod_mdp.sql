-- Modification du mot de passe d'un utilisateur

DELIMITER $$

CREATE PROCEDURE mod_mdp (prid int,  prmdp varchar(255) CHARSET utf8)
BEGIN
UPDATE Utilisateur SET Mdp = prmdp WHERE ID = prid;
END$$

DELIMITER ;
