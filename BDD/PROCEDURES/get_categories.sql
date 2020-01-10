-- Selection des categories

DELIMITER $$

CREATE PROCEDURE get_categories ()
BEGIN
SELECT ID, Intitule FROM Categorie ORDER BY ID DESC;
END$$

DELIMITER ;
