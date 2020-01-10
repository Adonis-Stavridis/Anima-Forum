-- Verification de connection d'un utilisateur

DELIMITER $$

CREATE PROCEDURE con_utilisateur (prlogin varchar(32) CHARSET utf8)
BEGIN
select Utilisateur.ID as ID, Login, Mdp, Pseudo, Mail, Signification from Utilisateur, Droit WHERE Login = prlogin AND Utilisateur.Droit = Droit.id;
END$$

DELIMITER ;
