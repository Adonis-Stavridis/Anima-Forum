-- Mettre a jour une note d'un topic

DELIMITER $$

CREATE PROCEDURE upd_notetopic (prnote int, prutilisateur int, prtopic int)
BEGIN
UPDATE Topic_note SET Note = prnote WHERE Utilisateur = prutilisateur AND Topic = prtopic;
END$$

DELIMITER ;
