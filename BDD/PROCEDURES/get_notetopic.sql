-- Verification de l'existence de note d'un utilisateur pour un topic

DELIMITER $$

CREATE PROCEDURE get_notetopic (prutilisateur int, prtopic int)
BEGIN
SELECT Note FROM Topic_note WHERE Utilisateur = prutilisateur AND Topic = prtopic;
END$$

DELIMITER ;
