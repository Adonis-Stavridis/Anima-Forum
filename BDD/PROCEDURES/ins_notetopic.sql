-- Inserer une note d'un topic

DELIMITER $$

CREATE PROCEDURE ins_notetopic (prnote int, prutilisateur int, prtopic int)
BEGIN
INSERT INTO Topic_note(Note, Utilisateur, Topic) VALUES (prnote, prutilisateur, prtopic);
END$$

DELIMITER ;
