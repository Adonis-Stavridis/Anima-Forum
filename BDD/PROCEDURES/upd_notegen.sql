-- Mettre à jour une note d'un topic

DELIMITER $$

CREATE PROCEDURE upd_notegen (prnote int, prtopic int)
BEGIN
UPDATE Topic SET Note = prnote WHERE ID = prtopic;
END$$

DELIMITER ;
