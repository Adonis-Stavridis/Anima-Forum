-- Ajout d'un utilisateur dans la base de données

DELIMITER $$

CREATE PROCEDURE ins_utilisateur (prlogin varchar(32) CHARSET utf8, prmdp varchar(255) CHARSET utf8, prpseudo varchar(32) CHARSET utf8, prmail varchar(255) CHARSET utf8)
BEGIN
INSERT INTO Utilisateur(Login, Mdp, Pseudo, Mail, Droit) VALUES (prlogin, prmdp, prpseudo, prmail, 1);
END$$

DELIMITER ;
