-- Suppresion d'un topic de la base de données

DELIMITER $$

CREATE PROCEDURE sup_topic (prid int)
BEGIN
-- Il faut aussi supprimer les notes des commentaires
DELETE FROM Commentaire WHERE Topic = prid;
DELETE FROM Topic_note WHERE Topic = prid;
DELETE FROM Topic WHERE ID = prid;
END$$

DELIMITER ;
