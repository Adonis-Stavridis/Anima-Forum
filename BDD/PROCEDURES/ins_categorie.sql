-- Ajout d'une categorie dans les bases de données

DELIMITER $$

CREATE PROCEDURE ins_categorie (printitule varchar(255) CHARSET utf8, prutilisateur int)
BEGIN
INSERT INTO Categorie(Intitule, Utilisateur) VALUES (printitule, prutilisateur);
END$$

DELIMITER ;
