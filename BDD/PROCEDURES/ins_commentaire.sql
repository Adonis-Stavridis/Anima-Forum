-- Ajout d'un commentaire dans la base de données

DELIMITER $$

CREATE PROCEDURE ins_commentaire (printitule varchar(255) CHARSET utf8, prutilisateur int, prtopic int)
BEGIN
INSERT INTO Commentaire(Intitule, Ecriture, Utilisateur, Topic) VALUES (printitule, CURDATE(), prutilisateur, prtopic);
END$$

DELIMITER ;
