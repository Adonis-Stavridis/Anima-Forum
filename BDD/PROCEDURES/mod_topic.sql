-- Modification de l'intitule d'un topic

DELIMITER $$

CREATE PROCEDURE mod_topic (prid int, printitule varchar(255) CHARSET utf8)
BEGIN
UPDATE Topic SET Intitule = printitule WHERE ID = prid;
END$$

DELIMITER ;
