-- Ajout d'un topic dans les bases de données

DELIMITER $$

CREATE PROCEDURE ins_topic (printitule varchar(255) CHARSET utf8, prutilisateur int, prcategorie int)
BEGIN
INSERT INTO Topic(Intitule, Utilisateur, Categorie, Modif) VALUES (printitule, prutilisateur, prcategorie, CURDATE());
END$$

DELIMITER ;
