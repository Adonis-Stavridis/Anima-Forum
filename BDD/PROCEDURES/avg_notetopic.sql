-- Recuperer moyenne d'une note d'un topic

DELIMITER $$

CREATE PROCEDURE avg_notetopic (prtopic int)
BEGIN
SELECT AVG(Note) as Avg FROM Topic_note WHERE Topic = prtopic;
END$$

DELIMITER ;
